<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TransactionCategory;
use App\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionCategoryMapping>
 */
class TransactionCategoryMappingFactory extends Factory
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
            'category_id' => TransactionCategory::all()->pluck('id')->random(),
        ];
    }
}
