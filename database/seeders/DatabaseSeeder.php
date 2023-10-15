<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

/* external models */
use App\Models\User;
use App\Models\TransactionCategory;
use App\Models\Wallet;
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
        //create testing user account with all details
        User::create([
            'Firstname' => 'John',
            'Lastname' => 'Doe',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'Username' => 'Johnny',
            'Phone' => '1234567890',
            'role' => 'user',
            'status' => 'active',
            'avatar' => 'test_user.jpg',
            'email_verified_at' => '2021-01-01 00:00:00',
        ]);
        /* create user admin account */
        User::create([
            'Firstname' => 'Admin',
            'Lastname' => 'Admin',
            'email' => 'Admin@admin.com',
            'password' => 'password',
            'role' => 'admin',
        ]);


        /* Admin account wallet */
        Wallet::create([
            'user_id' => 2,
        ]);

        User::factory(10)->create();



        $this->call([
            CurrencySeeder::class,
            TransactionCategoryMappingSeeder::class,
            TransactionLogSeeder::class,
            TransactionCategorySeeder::class,
        ]);

        Transaction::factory(50)->create();
    }
}
