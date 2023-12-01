<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;


class PaystackController extends Controller
{

    protected $client;
    protected $secret_key;
    protected $payment_url;
    protected $endpoints;

    public function __construct()
    {
        $this->client = new Client();
        $this->secret_key = env('PAYSTACK_SECRET_KEY');
        $this->payment_url = env('PAYSTACK_PAYMENT_URL');

        $this->endpoints = new \stdClass();
        $this->endpoints->initialize = '/initialize';
        $this->endpoints->verify = '/verify';
        $this->endpoints->transfer = '/transferrecipient';
    }

    public function GetAuthorizationUrl($email, $amount, $referenceid)
    {
        $url = $this->payment_url . '/initialize';

        $body = [
            'email' => $email,
            'amount' => $amount,
            'reference' => $referenceid,
        ];

        try {
            $response = $this->client->request('POST', $url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->secret_key,
                    'Content-Type' => 'application/json',
                    'Accept' => 'application/json',
                ],
                'json' => $body,
            ]);

            $response_body = json_decode($response->getBody(), true);

            return [
                'status' => true,
                'data' => [
                    'authorizarion_url' => $response_body['data']['authorization_url'],
                ]
            ];
        } catch (\Throwable $th) {
            return [
                'status' => false,
                'data' => [
                    'message' => $th->getMessage(),
                ],
            ];
        }
    }

    public function verifyTransaction($referenceid)
    {
        $url = url($this->payment_url . '/verify/' . $referenceid);

        $response = $this->client->request('GET', $url, [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->secret_key,
                'Content-Type' => 'application/json',
                'Accept' => 'application/json',
            ],
        ]);

        $response_body = json_decode($response->getBody(), true);


        return $response_body;
    }
}
