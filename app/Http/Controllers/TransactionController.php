<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\BillCategory;

class TransactionController extends Controller
{
    protected $user, $PG;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->PG = 'PayStack';
    }

    /**
     * The function retrieves transactions from the database for a specific user, sorted by the most recent
     * update.
     *
     * @return a collection of transactions.
     */
    public function getTransactions()
    {
        //gets the transactions of the user from the database
        $transactions = Transaction::where('sender_id', $this->user->id)
            ->orWhere('receiver_id', $this->user->id)
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

        //link the transaction to its category by getting the category id from the database



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
}
