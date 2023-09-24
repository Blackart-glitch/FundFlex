<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class CurrencyController extends Controller
{
    protected $currencies = 'currencies';

    /**
     * gives the list of currencies supported
     */
    public function index()
    {

        $currencies = [
            'USD',
            'EUR',
            'GBP',
            'INR',
            'AUD',
            'CAD',
            'SGD',
            'CHF',
            'MYR',
            'JPY',
            'CNY',
        ];
    }

    public function listCurrencies(Request $request): View
    {
        return view('currency.list', [
            'currencies' => $request->user()->currencies,
        ]);
    }
}
