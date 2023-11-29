<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\BillCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Sequence;

/* external models */
use App\Models\User;
use App\Models\Wallet;
use App\Models\Transaction;

/* seeders */
use Database\Seeders\CurrencySeeder;
use Database\Seeders\BillsSeeder;

use Illuminate\Support\Facades\Auth;

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
            'email_verified_at' => '2023-10-27 00:00:00',
        ]);

        //create admin account with all details
        User::create([
            'Firstname' => 'FundFlex',
            'Lastname' => 'PLC',
            'email' => 'support@FundFlex.com',
            'password' => 'superencryptedpassword',
            'Username' => 'Fundflex',
            'Phone' => '1234567890',
            'role' => 'admin',
            'status' => 'active',
            'avatar' => 'admin.jpg',
            'email_verified_at' => '2023-10-27 00:00:00',
        ]);

        /* Test account wallet */
        Wallet::create([
            'user_id' => 1,
            'account_number' => '45367657223',
            'balance' => 100000,
            'status' => 'active',
            'currency' => 23
        ]);

        /* Admin account wallet */
        Wallet::create([
            'user_id' => 2,
            'account_number' => '45367657224',
            'balance' => 0,
            'status' => 'active',
            'currency' => 23
        ]);

        //User::factory(20)->create();



        $this->call([
            CurrencySeeder::class,
            TransactionLogSeeder::class,
            BillCategorySeeder::class,
        ]);

        Transaction::factory(10)->create();

        $this->call([
            BillsSeeder::class,
            TransactionBillMappingSeeder::class,
            BanksSeeder::class
        ]);
    }
}
