<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SecurityTokenController;
use App\Providers\RouteServiceProvider;

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

    public function index(Request $request)
    {
        //if request is get
        if ($request->isMethod('get')) {
            /*             //get the form data of the request
            $data = $request->all();
            //store the data in the session
            session(['transaction_details' => $data]); */

            //perform two factor authentication
            $response = $this->store($request->user());

            //return the view
            return view('auth.verify-two-factor', ['qrcode' => $response]);
        } elseif ($request->isMethod('post')) {

            //get the pin from the request
            $pin = $request->token;

            //validate the token
            $response = $this->validateToken($pin);

            if ($response === 'True') {
                //redirect to intended route
                return redirect()->intended(RouteServiceProvider::HOME . '?two_factor=1');
            } else {
                //return error message
                return redirect()->back()->with('error', 'Invalid token, please try again.');
            }
        }
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

    public function validateToken($token)
    {
        $user = Auth::user();
        //gets the user token stored in the table
        $userToken = (new SecurityTokenController())->find($user->id, 'two-factor');

        //sends a pair request to google authenticator api
        $response = $this->client->request('GET', 'https://www.authenticatorApi.com/Validate.aspx', [
            'query' => [
                'Pin' => $token,
                'SecretCode' => $userToken->token_value,
            ]
        ]);

        $response = $response->getBody()->getContents();;
        return $response;
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

        $response = $response->getBody()->getContents();

        // Return the QR code
        return [
            'qrcode' => $response,
        ];
    }
}
