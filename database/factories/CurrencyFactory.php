<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Currency;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Currency>
 */
class CurrencyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
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

        $check = 0;

        $key = array_rand($currencies);

        while ($check === 0) {
            //checks if the currency code already exists in the database
            $check = Currency::where('currency_code', $key)->count();
            if ($check === 0) {
                //if the currency code does not exist, return the currency code and name
                return [
                    'currency_code' => $key,
                    'currency_name' => $currencies[$key],
                ];
            } else {
                //else generate a new currency code
                $key = array_rand($currencies);
                return [
                    'currency_code' => $key,
                    'currency_name' => $currencies[$key],
                ];
            }
        }
    }
}
