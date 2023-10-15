<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionCategory;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $Categories = [
            'Tuition Fees',
            'Enrollment Fees',
            'Exam Fees',
            'Library Fines',
            'Dormitory Fees',
            'Lab Fees',
            'Books and Study Materials',
            'Student Association Fees',
            'Sports Fees',
            'Meal Plan Fees',
            'Transportation Fees',
            'Health Services Fees',
            'Parking Fees',
            'Donations',
            'Scholarships',
            'Grants',
            'Salaries',
            'Research Grants',
            'Vendor Payments',
            'Utility Bills',
            'Equipment Purchase',
            'Maintenance and Repairs',
            'IT Services',
            'Events and Tickets',
        ];


        foreach ($Categories as $Category) {
            TransactionCategory::create([
                'name' => $Category,
            ]);
        }
    }
}
