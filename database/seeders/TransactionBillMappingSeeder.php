<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* model */
use App\Models\TransactionBillMapping;
use App\Models\BillCategory;
use App\Models\Transaction;

class TransactionBillMappingSeeder extends Seeder
{

    public function run(): void
    {
        $transactionIds = Transaction::all()->pluck('id');
        $categoryIds = BillCategory::all()->pluck('id')->shuffle();

        $categoryCount = $categoryIds->count();

        foreach ($transactionIds as $transactionId) {
            $billId = $categoryIds[$transactionId % $categoryCount];

            TransactionBillMapping::create([
                'transaction_id' => $transactionId,
                'bill_id' => $billId,
            ]);
        }
    }
}
