<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TransactionCategory;

class TransactionCategoryStagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categorySubdivisions = [
            'Tuition Fees' => [
                'Departmental Tuition',
                'Course Registration Fee',
                'Miscellaneous Fees',
            ],
            'Enrollment Fees' => [
                'Admission Fee',
                'Orientation Fee',
                'ID Card Fee',
            ],
            'Exam Fees' => [
                'Semester Exam Fee',
                'Final Exam Fee',
                'Special Exam Fee',
            ],
            'Library Fines' => [
                'Overdue Book Fines',
                'Lost/Damaged Book Fines',
            ],
            'Dormitory Fees' => [
                'Room Rent',
                'Security Deposit',
                'Late Payment Fee',
            ],
            'Lab Fees' => [
                'Lab Usage Fee',
                'Lab Supplies',
            ],
            'Books and Study Materials' => [
                'Textbooks',
                'Stationery',
                'Notebooks',
            ],
            'Student Association Fees' => [
                'Membership Dues',
                'Event Fees',
            ],
            'Sports Fees' => [
                'Athletic Membership',
                'Equipment Rental',
            ],
            'Meal Plan Fees' => [
                'Meal Plan Subscription',
                'Dining Hall Charges',
            ],
            'Transportation Fees' => [
                'Bus Passes',
                'Shuttle Service',
            ],
            'Health Services Fees' => [
                'Health Center Charges',
                'Health Insurance Premium',
            ],
            'Parking Fees' => [
                'Parking Permit',
                'Visitor Parking Fees',
            ],
            'Donations' => [
                'Charitable Donations',
                'Fundraising Donations',
            ],
            'Scholarships' => [
                'Merit-Based Scholarships',
                'Need-Based Scholarships',
            ],
            'Grants' => [
                'Research Grants',
                'Educational Grants',
            ],
            'Salaries' => [
                'Faculty Salaries',
                'Staff Salaries',
            ],
            'Vendor Payments' => [
                'Supplies Purchase',
                'Service Fees',
            ],
            'Utility Bills' => [
                'Electricity Bills',
                'Water Bills',
                'Internet and Communication',
            ],
            'Equipment Purchase' => [
                'Lab Equipment',
                'IT Equipment',
            ],
            'Maintenance and Repairs' => [
                'Facility Maintenance',
                'Equipment Repairs',
            ],
            'IT Services' => [
                'Software Licensing',
                'IT Support Services',
            ],
            'Events and Tickets' => [
                'Event Tickets',
                'Event Registration Fees',
            ],
        ];

        foreach ($categorySubdivisions as $category => $subdivisions) {
            $category = TransactionCategory::where('name', $category)->first();

            foreach ($subdivisions as $subdivision) {
                TransactionCategory::create([
                    'name' => $subdivision,
                    'category_id' => $category->id,
                ]);
            }
        }
    }
}
