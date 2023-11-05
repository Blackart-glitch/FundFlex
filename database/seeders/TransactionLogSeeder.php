<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* model */
use App\Models\TransactionLog;
use App\Models\Transaction;

class TransactionLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactions = Transaction::all();

        $status = [
            'initiated',
            'pending',
            'completed',
        ];

        foreach ($transactions as $transaction) {
            // Create a log for the transaction
            foreach ($status as $value) {
                TransactionLog::create([
                    'transaction_id' => $transaction->id,
                    'log_message' => $value,
                ]);
            }
        }
    }
}
