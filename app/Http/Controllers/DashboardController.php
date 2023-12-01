<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CurrencyController;
use App\Http\Controllers\Auth\RegisteredUserController;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        //get wallet details from database
        $wallet = (new WalletController())->getWallet($user->id);

        //get the transaction history of the user
        $transactions = (new TransactionController())->getTransactions()->take(5);
        foreach ($transactions as $transaction) {
            $transaction->currency = (new CurrencyController())->show($transaction->currency_id)->code;
            $name = (new RegisteredUserController())->show($transaction->sender_id);
            $transaction->sender = $name->Firstname . ' ' . $name->Lastname;
            $name = (new RegisteredUserController())->show($transaction->receiver_id);
            $transaction->receiver = $name->Firstname . ' ' . $name->Lastname;
        }


        //get all transactions of the user by type debit sort by within the current month
        $debit = (new TransactionController())->getTransactions($user)->where('sender_id', $user->id);

        $sequence = [];
        //sort by weeks of the month in reverse and calculate the tottal amount spent for each week
        for ($i = 0; $i < 4; $i++) {
            $week[$i] = $debit->whereBetween('created_at', [now()->startOfWeek()->addDays($i * 7), now()->startOfWeek()->addDays(($i + 1) * 7)])->sum('amount');
            $sequence[] = $week[$i];
        }



        return view('dashboard', [
            'user' => $user,
            'wallet' => $wallet,
            'transactions' => $transactions,
            'spendings' => json_encode($sequence),
        ]);
    }

    public function linegraph($user)
    {
    }
}
