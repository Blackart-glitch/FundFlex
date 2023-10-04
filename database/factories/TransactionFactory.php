<?php

namespace Database\Factories;

use App\Models\Currency;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'user_id','transaction_type','amount','currency_id','timestamp','status','created_at', 'updated_at',
            'user_id' => 1, //User::all()->pluck('id')->random(),
            'transaction_type' => $this->faker->randomElement(['credit', 'debit']),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'currency_id' => Currency::all()->pluck('id')->random(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}
