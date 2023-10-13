<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
/* currency model */
use App\Models\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currencies = [
            'AED' => 'United Arab Emirates Dirham',
            'ARS' => 'Argentine Peso',
            'AUD' => 'Australian Dollar',
            'BDT' => 'Bangladeshi Taka',
            'BRL' => 'Brazilian Real',
            'CAD' => 'Canadian Dollar',
            'EUR' => 'Euro',
            'GBP' => 'British Pound Sterling',
            'NZD' => 'New Zealand Dollar',
            'PHP' => 'Philippine Peso',
            'PLN' => 'Polish Zloty',
            'RUB' => 'Russian Ruble',
            'SAR' => 'Saudi Arabian Riyal',
            'SEK' => 'Swedish Krona',
            'SGD' => 'Singapore Dollar',
            'THB' => 'Thai Baht',
            'TRY' => 'Turkish Lira',
            'TWD' => 'New Taiwan Dollar',
            'USD' => 'United States Dollar',
            'ZAR' => 'South African Rand',
        ];



        foreach ($currencies as $code => $name) {
            Currency::create([
                'currency_code' => $code,
                'currency_name' => $name,
            ]);
        }
    }
}
