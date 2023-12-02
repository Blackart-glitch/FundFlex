<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsTopUpRequest;
use App\Http\Requests\PaymentsWithdrawRequest;
use App\Http\Requests\PaymentsTransferRequest;
use App\Http\Requests\PaymentsBillRequest;
use App\Http\Controllers\PaystackController;
use App\Http\Controllers\WalletController;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BillCategory;
use App\Models\Currency;
use App\Models\TransactionLog;
use App\Models\TransactionBillMapping;
use App\Models\paystack_customer_accounts;
use Carbon\Carbon;
use Illuminate\Support\Str;

class TransactionController extends Controller
{
    protected $user;
    protected $PG;
    protected $fundflexaccount;

    public function __construct()
    {
        $this->user = auth()->user();
        $this->PG = 'PayStack';
        $this->fundflexaccount = 2;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $transactions = $this->getTransactions($user);

        foreach ($transactions as $transaction) {
            $transaction->currency = (new CurrencyController())->show($transaction->currency_id)->code;
            $name = (new RegisteredUserController())->show($transaction->sender_id);
            $transaction->sender = $name->Firstname . ' ' . $name->Lastname;
            $name = (new RegisteredUserController())->show($transaction->receiver_id);
            $transaction->receiver = $name->Firstname . ' ' . $name->Lastname;
        }

        return view('history', ['Transactions' => $transactions]);
    }

    public function getTransactions($user = null, $limit = 20)
    {

        if ($user == null) {
            $user = $this->user;
        };


        //gets the transactions of the user from the database
        $transactions = Transaction::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->take($limit)
            ->get();

        return $transactions;
    }

    public function store($data)
    {
        $this->PG = 'PayStack';

        //creates a new transaction record in the database
        $transaction = Transaction::create([
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'reference_id' => $data['reference_id'],
            'transaction_type' => $data['transaction_type'],
            'description' => $data['desc'],
            'amount' => $data['amount'],
            'currency_id' => $data['currency_id'],
            'status' => 'pending',
            'payment_gateway' => $this->PG
        ]);

        return $transaction;
    }

    public function show($id)
    {
        return Transaction::find($id);
    }

    public function updatestatus($status, $reference_id = null, $transaction_id = null)
    {
        if ($transaction_id !== null) {
            //updates the status of a transaction in the database
            $transaction = Transaction::find($transaction_id);
            $transaction->status = $status;
            $transaction->save();
        } else {
            //updates the status of a transaction in the database
            $transaction = Transaction::where('reference_id', $reference_id)->first();
            $transaction->status = $status;
            $transaction->save();
        }

        return $transaction;
    }

    public function topUp(PaymentsTopUpRequest $request)
    {

        //receives the data from the request
        $amount = $request->amount;
        $currency = $request->currency;
        $userid = auth()->user()->id;

        $currency = (new CurrencyController())->show($currency)->code;

        //temporary fix for multicurrency support
        if ($currency ==  'NGN') {
            $amount = $amount * 100;
        } else {
            return redirect()->route('dashboard')->with('error', 'Sorry, "' . $currency . '" support is not available at the moment. Only NGN is supported.');
        }

        //creates a new transaction record in the database
        $data = [
            'sender_id' => $this->fundflexaccount,
            'receiver_id' => $userid,
            'reference_id' => Str::ulid(),
            'transaction_type' => 'credit',
            'desc' => 'Top Up fundflex balance',
            'amount' => $request->amount,
            'currency_id' => $request->currency,
        ];


        $transaction = $this->store($data);

        $log = [
            'transaction_id' => $transaction->id,
            'log_message' => 'Transaction initiated for user' . $userid . 'to top up $amount $currency',
        ];

        //creates a new transaction log record in the database
        $transactionlog = $this->log($log);

        //authorize the payment
        $paystack = (new PaystackController())->GetAuthorizationUrl(auth()->user()->email, $amount, $transaction->reference_id);

        //sends an email (would be done later)

        if ($paystack['status'] == false) {
            return redirect()->route('dashboard')->with('error', 'Sorry, we could not process your request. Please try again later.');
        }

        //redirects the user to the payment gateway
        return redirect()->intended($paystack['data']['authorizarion_url']);
    }

    public function withdraw(PaymentsWithdrawRequest $request)
    {
        $user = Auth::user();

        //receives the data from the request
        $amount = $request->amount;
        $userid = auth()->user()->id;

        $wallet = (new WalletController())->getWallet($userid);
        if ($wallet->balance < $amount) {
            return redirect()->route('dashboard')->with('error', 'Sorry, you do not have enough funds to complete this transaction.');
        } else {
            //temporary fix for multicurrency support

            //attempt to get the currency code
            $currency = (new CurrencyController())->show($wallet->currency);
            if ($currency->code ==  'NGN') {

                //update wallet balance
                $wallet->balance = $wallet->balance - $amount;
                $wallet->save();
            } else {
                return redirect()->route('dashboard')->with('error', 'Sorry, "' . $wallet->currency . '" support is not available at the moment. Only NGN is supported.');
            }
        }

        //creates a new transaction record in the database
        $data = [
            'sender_id' => $userid,
            'receiver_id' => $this->fundflexaccount,
            'reference_id' => Str::ulid(),
            'transaction_type' => 'debit',
            'desc' => 'Withdraw from fundflex balance',
            'amount' => $request->amount,
            'currency_id' => $wallet->currency,
        ];

        $transaction = $this->store($data);

        $log = [
            'transaction_id' => $transaction->id,
            'log_message' => 'Transaction initiated for user' . $userid . 'to withdraw $amount $currency',
        ];

        //creates a new transaction log record in the database
        $transactionlog = $this->log($log);

        //checks if user has a paystack code
        $recipient = paystack_customer_accounts::where('user_id', $user->id)->first();

        if ($recipient !== null) {
            //deducts the amount from the user's wallet
            $wallet->balance = $wallet->balance - $amount;
            $wallet->save();

            //sends a request to the payment gateway to initiate a transfer
            //$transfer = (new PaystackController())->initiateTransfer($amount, $recipient->customer_code, $transaction->reference_id, 'Fundflex Withdrawal');

            return redirect()->route('dashboard')->with('success', 'Transaction Initiated, you would get a notification when the transfer is completed.');
        }

        //sends a request to the payment gateway to create a recipient account
        $recipient = (new PaystackController())->createTransferRecipient($request->account_number, $request->bank_code, $request->account_name);

        if ($recipient['status'] == false) {
            return redirect()->route('dashboard')->with('error', 'Sorry, we could not process your request. Please try again later.');
        }

        //saves the recipient code to the database
        $recipient = paystack_customer_accounts::create([
            'user_id' => $user->id,
            'customer_code' => $recipient['data']['recipient_code'],
        ]);


        //deducts the amount from the user's wallet
        $wallet->balance = $wallet->balance - $amount;
        $wallet->save();

        //sends a request to the payment gateway to initiate a transfer
        //$transfer = (new PaystackController())->initiateTransfer($amount, $recipient['data']['recipient_code'], $transaction->reference_id, 'Fundflex Withdrawal');

        return redirect()->route('wallet')->with('success', 'the withdrawal has been processed, but traditional banks might take time to process it.');
    }

    public function transfer(PaymentsTransferRequest $request)
    {
        $user = Auth::user();

        //receives the data from the request
        {
            $amount = $request->amount;
            $wallet = $request->wallet_number;
            $desc = $request->description;
        }


        if ($desc == null) {
            $desc = 'Fundflex Transfer';
        }


        //verify the wallet number again
        $receiver = (new WalletController())->find($wallet);


        //verify that the sender has enough funds
        $sender = (new WalletController())->getWallet($user->id);

        $state = [
            'sender' => $sender,
            'receiver' => $receiver,
        ];


        if ($sender->balance < $amount) {
            return redirect()->route('dashboard')->with('error', 'Sorry, you do not have enough funds to complete this transaction.');
        } else {
            if ($sender->currency == $receiver->currency) {
                //creates a new transaction record in the database
                $data = [
                    'sender_id' => $user->id,
                    'receiver_id' => $receiver->user_id,
                    'reference_id' => Str::ulid(),
                    'transaction_type' => 'debit',
                    'desc' => $desc,
                    'amount' => $request->amount,
                    'currency_id' => $sender->currency,
                ];

                $transaction = $this->store($data);

                //creates another transaction record in the database
                $data = [
                    'sender_id' => $user->id,
                    'receiver_id' => $receiver->user_id,
                    'reference_id' => Str::ulid(),
                    'transaction_type' => 'credit',
                    'desc' => $desc,
                    'amount' => $request->amount,
                    'currency_id' => $sender->currency,
                ];

                $transaction = $this->store($data);

                $log = [
                    'transaction_id' => $transaction->id,
                    'log_message' => 'Transaction initiated for user' . $user->id . 'to transfer $amount $currency to user' . $receiver->user_id,
                ];
                $transactionlog = $this->log($log);

                try {
                    //update the sender's wallet
                    $sender->balance = $sender->balance - $amount;
                    $sender->save();

                    //update the receiver's wallet
                    $receiver->balance = $receiver->balance + $amount;
                    $receiver->save();

                    //log the transaction
                    $log = [
                        'transaction_id' => $transaction->id,
                        'log_message' => 'Transaction successful for user' . $user->id . 'to transfer $amount $currency to user' . $receiver->user_id,
                    ];
                    $transactionlog = $this->log($log);

                    //update the transaction status
                    $status = $this->updatestatus('success', null, $transaction->id);

                    return redirect()->route('dashboard')->with('success', 'Transaction successful');
                } catch (\Throwable $th) {
                    //this section doesn't work yet. i will fix that later. implementing force rollback

                    //log the transaction
                    $log = [
                        'transaction_id' => $transaction->id,
                        'log_message' => 'Transaction failed for user' . $user->id . 'to transfer $amount $currency to user' . $receiver->user_id . ', REASON: ' . $th,
                    ];


                    //creates a new transaction log record in the database
                    $transactionlog = $this->log($log);

                    //update the transaction status
                    $status = $this->updatestatus('failed', null, $transaction->id);

                    return redirect()->route('dashboard')->with('error', 'Sorry, we could not process your request. Please try again later.');
                }

                //log the transaction again
                $log = [
                    'transaction_id' => $transaction->id,
                    'log_message' => 'Transaction successful for user' . $user->id . 'to transfer $amount $currency to user' . $receiver->user_id,
                ];
            } else {
                //multicurrency not supported yet
                return redirect()->route('dashboard')->with('error', 'Sorry, multicurrency support is not available at the moment. Please try again later.');
            }
        }
    }

    public function payBill(PaymentsBillRequest $request)
    {
        $user = Auth::user();

        $wallet = (new WalletController())->getWallet($user->id);

        $bill = (new BillController())->getBill($request->bill_id);
        $payment_mode = $request->payment_mode;

        $state = [
            'wallet' => $user->wallet,
            'bill' => $bill,
            'payment_mode' => $payment_mode,
        ];

        //calculate the amount to be paid
        $amount = $bill->amount + $bill->tax;

        if ($bill->due_date < Carbon::now()) {
            $amount = $bill->amount + $bill->late_fee;
        } else {

            if ($bill->discount !== null) {
                $amount = $amount - $bill->discount;
            }
        }

        //verify that the user has enough funds
        if ($wallet->balance < $amount) {
            return redirect()->route('dashboard')->with('error', 'Sorry, you do not have enough funds to complete this transaction.');
        }

        if ($wallet->currency !== $bill->currency_id) {
            return redirect()->route('dashboard')->with('error', 'Sorry, multicurrency support is not available at the moment. Please try again later.');
        }

        //creates a new transaction record in the database
        $data = [
            'sender_id' => $user->id,
            'receiver_id' => $this->fundflexaccount,
            'reference_id' => Str::ulid(),
            'transaction_type' => 'debit',
            'desc' => 'Bill Payment for ' . $bill->title,
            'amount' => $amount,
            'currency_id' => $wallet->currency,
        ];
        $transaction = $this->store($data);

        //links transaction to bill
        $this->linkTransactionToBill($transaction->id, $bill->id);


        $log = [
            'transaction_id' => $transaction->id,
            'log_message' => 'Transaction initiated for user' . $user->id . 'to pay for bill' . $bill->id,
        ];
        $this->log($log);

        try {
            //update the sender's wallet
            $wallet->balance = $wallet->balance - $amount;
            $wallet->save();

            //log the transaction
            $log = [
                'transaction_id' => $transaction->id,
                'log_message' => 'Transaction successful for user' . $user->id . 'to pay $amount $currency for bill' . $bill->id,
            ];
            $transactionlog = $this->log($log);

            //update the transaction status
            $status = $this->updatestatus('success', null, $transaction->id);

            return redirect()->route('dashboard')->with('success', 'Transaction successful');
        } catch (\Throwable $th) {
            //log the transaction
            $log = [
                'transaction_id' => $transaction->id,
                'log_message' => 'Transaction failed for user' . $user->id . 'to pay $amount $currency for bill "' . $bill->id . '", REASON: ' . $th,
            ];
            $this->log($log);

            //update the transaction status
            $status = $this->updatestatus('failed', null, $transaction->id);

            //checks if the wallet was debited
            if ($state['wallet']->balance > $wallet->balance) {

                //refund the wallet
                $wallet->balance = $wallet->balance + $amount;
                $wallet->save();

                //log the transaction
                $log = [
                    'transaction_id' => $transaction->id,
                    'log_message' => 'Transaction refund for user' . $user->id . 'to pay $amount $currency for bill "' . $bill->id . '", REASON: ' . $th,
                ];
                $this->log($log);

                //new transaction
                $data = [
                    'sender_id' => $bill->user_id,
                    'receiver_id' => $user->id,
                    'reference_id' => Str::ulid(),
                    'transaction_type' => 'credit',
                    'desc' => 'Refund Bill Payment for ' . $bill->title,
                    'amount' => $amount,
                    'currency_id' => $bill->currency_id,
                ];
                $refund = $this->store($data);
                $this->updatestatus('success', null, $refund->id);
                $this->linkTransactionToBill($refund->id, $bill->id);

                return redirect()->route('dashboard')->with('error', 'Sorry, we could not process your request and you have been refunded. Please try again later.');
            }

            return redirect()->route('dashboard')->with('error', 'Sorry, we could not process your request. Please try again later.');
        }
    }

    public function log($data, $callback = false)
    {
        $log = TransactionLog::create([
            'transaction_id' => $data['transaction_id'],
            'log_message' => $data['log_message'],
        ]);

        if ($callback) {
            return $log;
        }
    }

    public function linkTransactionToBill($txn_id, $bill_id)
    {
        $transaction = Transaction::find($txn_id);
        $bill = (new BillController())->getBill($bill_id);

        //links the transaction to the bill in the transaction_bill_mapping table
        $map = TransactionBillMapping::create([
            'transaction_id' => $transaction->id,
            'bill_id' => $bill->id,
        ]);

        return $map;
    }

    public function verify_PG_transaction(Request $request)
    {
        $user = Auth::user();

        //receives the reference id from the get request
        $trxref = $request->query('trxref');
        $reference = $request->query('reference');

        //verifies the transaction with the payment gateway
        $transaction = (new PaystackController())->verifyTransaction($reference);

        if ($transaction['status'] == 'true') {
            if ($transaction['data']['status'] == 'success') {

                //updates the transaction status in the database
                $status = $this->updatestatus('success', $reference);

                //convert amount to naira
                $amount = $transaction['data']['amount'] / 100;

                //updates the user's wallet balance
                //gets the transaction currency
                $currency = $transaction['data']['currency'];
                //look it up in the database and get the code
                $currency = Currency::where('code', $currency)->first();

                //if the currency doesn't exist, then use the default currency
                if ($currency === null) {
                    $currency = Currency::where('code', 'NGN')->first();

                    //log the case
                    $log = [
                        'transaction_id' => $transaction->id,
                        'log_message' => 'Transaction coverted to base currency "NGN" for user' . $this->user->id . 'to top up' . $amount . $transaction['data']['currency'],
                    ];
                }

                $wallet = (new WalletController())->UpdateBalance($user->id, $amount, $currency->id);

                $transaction = Transaction::where('reference_id', $reference)->first();

                //log the transaction
                $log = [
                    'transaction_id' => $transaction->id,
                    'log_message' => 'Transaction successful for user' . $this->user . 'to top up $amount $currency',
                ];

                //creates a new transaction log record in the database
                $transactionlog = $this->log($log);
            } else {
                //updates the transaction status in the database
                $this->updatestatus('failed', $reference);

                //log the transaction
                $log = [
                    'transaction_id' => $transaction->id,
                    'log_message' => 'Transaction failed for user' . $this->user . 'to top up $amount $currency',
                ];

                //creates a new transaction log record in the database
                $transactionlog = $this->log($log);
            }
        } else {
            $status = $this->updatestatus('stuck', $reference);

            return redirect()->view('errors.critical', ['message' => 'Sorry, we could not verify your transaction. Please contact support for assistance.']);
        }

        return redirect()->route('dashboard')->with('success', 'Transaction successful');
    }
}
