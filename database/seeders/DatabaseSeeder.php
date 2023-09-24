<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();
        \App\Models\Currency::factory(10)->create();
        \App\Models\TransactionCategory::factory(200)->create();
        \App\Models\Transaction::factory(70)->create();
        \App\Models\TransactionCategoryMapping::factory(70)->create();
        \App\Models\TransactionLog::factory(200)->create();
    }
}
