<?php

namespace App\Http\Controllers;

use App\Http\Requests\PaymentsTopUpRequest;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BillCategory;

class TransactionController extends Controller
{
    protected $user;
    protected $PG;
    protected $fundflexaccount;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->PG = 'PayStack';
        $this->fundflexaccount = 2;
    }

    public function index(Request $request)
    {
        $user = Auth::user();
        $transactions = $this->getTransactions($user);

        return view('history', ['Transactions' => $transactions]);
    }

    public function topUp(PaymentsTopUpRequest $request)
    {


        //creates a new transaction record in the database
        $data = [
            'sender_id' => $this->user->id,
            'receiver_id' => $this->fundflexaccount,
            'transaction_type' => 'credit',
            'description' => 'Top Up fundflex balance',
            'amount' => $request->amount,
            'currency_id' => $request->currency,
            'status' => 'pending',
            'payment_gateway' => $this->PG,
        ];

        $log = [];
    }

    public function withdraw()
    {
    }

    public function transfer()
    {
    }

    public function payBill()
    {
    }


    public function payment_gateway_accept()
    {
    }



    /**
     * The function retrieves transactions from the database for a specific user, sorted by the most recent
     * update.
     *
     * @return a collection of transactions.
     */
    public function getTransactions($user = null)
    {

        if ($user == null) {
            $user = $this->user;
        };

        //gets the transactions of the user from the database
        $transactions = Transaction::where('sender_id', $user->id)
            ->orWhere('receiver_id', $user->id)
            ->orderBy('updated_at', 'desc')
            ->get();

        return $transactions;
    }

    public function store($data)
    {
        //creates a new transaction record in the database
        $transaction = Transaction::create([
            'sender_id' => $data['sender_id'],
            'receiver_id' => $data['receiver_id'],
            'transaction_type' => $data['transaction_type'],
            'description' => $data['desc'],
            'amount' => $data['amount'],
            'currency_id' => $data['currency_id'],
            'status' => $data['status'],
            'payment_gateway' => $this->PG
        ]);

        return $transaction;
    }

    public function updatestatus($id, $status)
    {
        //updates the status of a transaction in the database
        $transaction = Transaction::find($id);
        $transaction->status = $status;
        $transaction->save();

        return $transaction;
    }

    public function log($data)
    {
    }

    public function link_txn($txn_id, $bill_id)
    {
    }
}
