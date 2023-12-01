<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Http\Requests\StorewalletRequest;
use App\Http\Requests\UpdatewalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BillController;
use App\Http\Controllers\CurrencyController;
use App\Models\Currency;

class WalletController extends Controller
{
    protected $user;
    protected $dollar_rate; //this is the dollar rate in naira
    protected $default_country; //this is the default country of the user

    public function __construct()
    {

        $this->default_country = 'NG';
    }

    public function index()
    {
        $user = auth()->user();
        $wallet = $this->getWallet($user->id) ?? null;
        if ($wallet !== null) {
            //dd($wallet);
            $wallet->currency = (new CurrencyController())->show($wallet->currency)->code;
        }
        $bills = (new BillController())->getuserbills();
        $currency = Currency::all();

        return view('wallet', [
            'user' => $user,
            'wallet' => $wallet,
            'bills' => $bills,
            'currencies' => $currency,
        ]);
    }

    public function generateAccountNumber($seed = null)
    {
        //get user phone
        $user = Auth::user();
        $phone = $user->Phone;

        //count from the back using the seed
        $seed = $seed ?? 10;
        $phone = substr($phone, -$seed);

        return $phone;
    }

    public function generateWallet(Request $request)
    {
        $user = Auth::user();
        //check if user has a phone number
        if ($user->Phone == null) {
            return redirect()->route('profile')->with('error', 'Please update your profile with your phone number to continue');
        }

        //check if user has a wallet before
        $wallet = wallet::where('user_id', $user->id)->first();
        if ($wallet !== null) {
            return redirect()->route('dashboard')->with('error', 'You already have a wallet.');
        }

        //generate an account number
        $account_number = $this->generateAccountNumber(10);

        //create a wallet
        $wallet = Wallet::create([
            'user_id' => $user->id,
            'account_number' => $account_number,
            'currency' => 21, //base currency is naira
        ]);

        // session(['success' => 'Wallet created successfully']);
        return redirect()->route('processing')->with('success', 'Wallet created successfully');
    }
    public function getWallet($user_id)
    {
        $wallet = wallet::where('user_id', $user_id)->first();

        return $wallet;
    }

    public function UpdateBalance($user_id, $amount, $currency_id = null)
    {
        $wallet = wallet::where('user_id', $user_id)->first();

        if ($currency_id !== null) {
            $currency = (new CurrencyController())->show($currency_id)->code;
            if ($currency == 'NGN') {
                $amount = $amount;
                $wallet->balance = $wallet->balance + $amount;
            } else {
                $wallet->balance = $wallet->balance + $this->ConvertCurrency($currency_id);
            }
        } else {
            /* else {
                $wallet->balance = $this->ConvertCurrency($currency_id);
            } */
        }
        $wallet->save();

        return $wallet;
    }

    public function ConvertCurrency($to)
    {
        //get the currency of the wallet
        $wallet = wallet::where('user_id', $this->user->id)->first();

        //convert the balance to the new currency
        $Currency_instance = new CurrencyController();
        $converted_balance = $Currency_instance->ConvertCurrency($to, $wallet->currency_id, $wallet->balance);

        //retrieve the converted balance
        $converted_balance = $converted_balance['result'];

        //return the new balance
        return $converted_balance;
    }

    public function find($wallet_number)
    {
        $wallet = wallet::where('account_number', $wallet_number)->first();

        return $wallet;
    }
}
