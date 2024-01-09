<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Bills;
use App\Models\bill_mapping;
use App\Models\User;
use App\Models\BillCategory;
use App\Models\Currency;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allLinks = [
            'https://images.unsplash.com/photo-1593538312308-d4c29d8dc7f1?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTV8fGJpbGxzfGVufDB8fDB8fHww',
            'https://plus.unsplash.com/premium_photo-1679860750641-0ab67ed5e69a?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTN8fGJpbGxzfGVufDB8fDB8fHww',
            'https://images.unsplash.com/photo-1625980344922-a4df108b2bd0?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MTl8fGJpbGxzfGVufDB8fDB8fHww',
            'https://images.unsplash.com/photo-1554672723-d42a16e533db?w=500&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8MjB8fGJpbGxzfGVufDB8fDB8fHww',
            'https://media.istockphoto.com/id/1408404108/photo/close-up-of-a-mid-adult-woman-checking-her-energy-bills-at-home-sitting-in-her-living-room.webp?b=1&s=170667a&w=0&k=20&c=Q73qu35cOr5eAaP9BQRSfrxwM7KaxVHnrjmD8KAnK34=',
        ];

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
            $randomLink = $allLinks[array_rand($allLinks)];

            $bill = Bills::create([
                'title' => $title,
                'description' => 'This is a sample description for the ' . $title . ' bill.',
                'amount' => rand(1000, 100000),
                'due_date' => Carbon::now()->addDays(rand(1, 30)),
                'category_id' => BillCategory::all()->random()->pluck('id')->first(),
                'status' => 'active',
                'attachment' => $randomLink, // Use the randomly selected link here
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
