<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Bills;
use App\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionCategoryMapping>
 */
class TransactionBillMappingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //pluck from transactions table and category table
            'transaction_id' => Transaction::all()->pluck('id')->random(),
            'bill_id' => Bills::all()->pluck('id')->random(),
        ];
    }
}
