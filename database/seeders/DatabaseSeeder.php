<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

/* external models */
use App\Models\User;
use App\Models\TransactionCategory;
use App\Models\TransactionCategoryMapping;
use App\Models\TransactionLog;
use App\Models\Wallet;
use App\Models\Currency;
use App\Models\Transaction;

/* seeders */
use Database\Seeders\CurrencySeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        TransactionCategory::factory(10)->create();
        //create testing user account with all details
        User::create([
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'email' => 'test@gmail.com',
            'password' => 'password'
        ]);
        /* create user admin account */
        User::create([
            'Firstname' => 'Admin',
            'Lastname' => 'Admin',
            'email' => 'Admin@admin.com',
        ]);

        Wallet::create([
            'user_id' => 1,

        ]);

        /* Admin account wallet */
        Wallet::create([
            'user_id' => 2,
        ]);

        User::factory(10)->create();

        Transaction::factory(50)->create();

        $this->call([
            CurrencySeeder::class,
            TransactionCategoryMappingSeeder::class,
            TransactionLogSeeder::class,
        ]);
    }
}
