<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\BillCategory;

class BillCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = [
            'Fees',
            'Fines',
            'Donations',
            'Scholarships',
            'Grants',
            'Salaries',
            'Research Grants',
            'Utility Bills',
            'Purchase',
            'Maintenance and Repairs',
            'Services',
            'Events and Tickets',
        ];


        foreach ($Categories as $Category) {
            BillCategory::create([
                'name' => $Category,
            ]);
        }
    }
}
