<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Transaction;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionLog>
 */
class TransactionLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'transaction_id' => Transaction::all()->pluck('id')->random(),
            'log_message' => "Transaction successful",
        ];
    }
}
