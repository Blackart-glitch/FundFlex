<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthentication extends Controller
{
    protected $AppName;
    protected $AppInfo;
    protected $client;

    public function __construct()
    {
        $this->AppName = 'FundFlex';
        $this->AppInfo = 'FundFlex 2FA';
        $this->client = new Client();
    }

    public function Is2faEnabled($user)
    {
        //gets the user data record from the database
        $user = User::find($user->id)->first();

        //checks if 2fa column of the user is enabled or disabled
        if ($user->two_factor == 'enabled') {
            return true;
        } else {
            return false;
        }
    }

    public function store($user)
    {
        //generates a new token and stores it to the database
        $token = (new SecurityTokenController())->store($user->id, true);

        //sends a pair request to google authenticator api
        $response = $this->client->request('GET', 'https://www.authenticatorApi.com/pair.aspx', [
            'query' => [
                'AppName' => $this->AppName,
                'AppInfo' => $this->AppInfo,
                'SecretCode' => $token,
            ]
        ]);

        return [
            'qrcode' => $response
        ];
    }
}
