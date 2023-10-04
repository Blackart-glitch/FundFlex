<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\wallet>
 */
class WalletFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //pluck user id from users table
            'user_id' => \App\Models\User::pluck('id')->random(),
            'balance' => $this->faker->randomFloat(2, 0, 1000000),
        ];
    }
}
