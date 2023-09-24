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
            'user_id' => User::all()->pluck('id')->random(),
            'transaction_type' => $this->faker->randomElement(['deposit', 'withdrawal']),
            'amount' => $this->faker->randomFloat(2, 1, 1000),
            'currency_id' => Currency::all()->pluck('id')->random(),
            'timestamp' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'status' => $this->faker->randomElement(['pending', 'completed', 'failed']),
        ];
    }
}