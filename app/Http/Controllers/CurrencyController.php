<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

use GuzzleHttp\Client;
use App\Models\Currency;

class CurrencyController extends Controller
{
    protected $rates;
    protected $currencies;
    protected $client;
    protected $base_url;
    protected $api_key;

    protected $fees;

    public function  __construct()
    {
        $this->client = new Client();
        $this->base_url = env('CURRENCY_API_URL');
        $this->api_key = env('CURRENCY_API_KEY');
    }
    /**
     * gives the list of currencies supported
     */
    public function index()
    {
        //get the list of currencies
        $currencies = Currency::all();

        return view('currency.index', [
            'currencies' => $currencies,
        ]);
    }

    public function show($id)
    {
        $currency = Currency::where('id', $id)->first();

        return $currency;
    }

    public function listCurrencies(Request $request): View
    {
        return view('currency.list', [
            'currencies' => $request->user()->currencies,
        ]);
    }

    public function store(Request $request)
    {
        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
        ]);

        return true;
    }

    public function ConvertCurrency($to, $from, $amount, $base_currency = null, $use_api = true)
    {
        if ($use_api) {
            $url = $this->base_url . '/convert?access_key=' . $this->api_key . '&from=' . $from . '&to=' . $to . '&amount=' . $amount . '&base=' . $base_currency;

            $response = $this->client->request('GET', $url);

            $result = json_decode($response->getBody(), true);
        }

        return $result;
    }
}
