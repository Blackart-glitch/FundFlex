<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use  App\Models\Bills;
use  App\Models\bill_mapping;
use  App\Models\User;
use  App\Models\BillCategory;
use App\Models\Currency;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = [
            'Undergraduate Tuition',
            'Undergraduate Stream 2 Tuition',
            'Graduate Tuition',
            'MBA Tuition',
            'Law School Tuition',
            'Medical School Tuition',
            'Electricity Bill',
            'Water Bill',
            'Gas Bill',
            'Internet Services',
            'Phone Services',
            'Cable TV Subscription',
            'Trash Collection Fee',
            'Sewer Services',
            'Heating Services',
            'Cooling Services',
        ];

        foreach ($titles as $title) {
            $bill = Bills::create([
                'title' => $title,
                'description' => 'This is a sample description for the ' . $title . ' bill.',
                'amount' => rand(1000, 100000),
                'due_date' => Carbon::now()->addDays(rand(1, 30)),
                'category_id' => BillCategory::all()->random()->pluck('id')->first(),
                'status' => 'active',
                'attachment' => 'https://placehold.co/600',
                'currency_id' => 21,
                'payment_method' => 'fundflex secure',
                'reference' => 'fundflex' . rand(100000, 999999),
                'late_fee' => rand(1000, 10000),
                'discounts' => rand(1000, 10000),
                'tax' => rand(100, 1000),
                'type' => 'recurring',
                'billing_period' => 'monthly',
            ]);


            bill_mapping::create([
                'bill_id' => $bill->id,
                'user_id' => User::all()->random()->id,
            ]);
        }
    }
}
