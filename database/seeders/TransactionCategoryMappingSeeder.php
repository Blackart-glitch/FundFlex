<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

/* model */
use App\Models\TransactionCategoryMapping;
use App\Models\TransactionCategory;
use App\Models\Transaction;

class TransactionCategoryMappingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $transactionIds = Transaction::all()->pluck('id');
        $categoryIds = TransactionCategory::all()->pluck('id');

        foreach ($transactionIds as $transactionId) {
            // Shuffle the category IDs to randomize the selection
            $shuffledCategoryIds = $categoryIds->shuffle();

            // Take the first category ID as the selected one
            TransactionCategoryMapping::create([
                'transaction_id' => $transactionId,
                'category_id' => $shuffledCategoryIds->first(),
            ]);
        }
    }
}
