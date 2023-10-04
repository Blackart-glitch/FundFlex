<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class WalletSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Wallet::factory()->count(10)->create();
        //maual for testing
        /* \App\Models\Wallet::create([
            'user_id' => 1,
            'balance' => 1000000,
        ]); */
    }
}
