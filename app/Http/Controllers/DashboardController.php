<?php

namespace App\Http\Controllers;

use App\Http\Controllers\WalletController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        //get wallet details from database
        $wallet = (new WalletController())->getWallet($user->id);

        //get the transaction history of the user
        $transactions = (new TransactionController())->getTransactions();



        return view('dashboard', [
            'user' => $user,
            'wallet' => $wallet,
            'transactions' => $transactions,
        ]);
    }
}
