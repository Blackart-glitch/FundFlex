<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        \App\Models\TransactionCategory::factory(200)->create();
        //create testing user account with all details
        \App\Models\User::create([
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);

        \App\Models\Wallet::create([
            'user_id' => 1,

        ]);

        \App\Models\User::factory(10)->create();
        \App\Models\Currency::factory(10)->create();
        \App\Models\Transaction::factory(7)->create();
        \App\Models\TransactionCategoryMapping::factory(70)->create();
        \App\Models\TransactionLog::factory(2)->create();
        \App\Models\Wallet::factory()->count(1)->create();
    }
}
