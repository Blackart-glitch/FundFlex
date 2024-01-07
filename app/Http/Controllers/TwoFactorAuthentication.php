<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\SecurityTokenController;
use App\Models\SecurityToken;
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

            //perform two factor authentication
            $response = $this->store($request->user());

            //temporary fix to prevent the qrcode from being displayed
            $response['qrcode'] = "<img src='" . asset('storage/Avatars/' . $request->user()->avatar) . "' border=0 width='150' height='150'> ";

            //return the view
            return view('auth.verify-two-factor', ['qrcode' => $response]);
        } elseif ($request->isMethod('post')) {

            //get the pin from the request
            $pin = $request->token;

            //validate the token
            $response = $this->validateToken($pin);

            if ($response === 'True') {

                //update the user two factor column to enabled
                User::where('id', $request->user()->id)->update(['two_factor' => 'enabled']);

                //redirect to intended route
                return redirect()->intended(RouteServiceProvider::HOME . '?two_factor=0');
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

    public function requestQR(request $request)
    {
        //get two_factor from the request
        $two_factor = $request->two_factor;

        $user = User::findorfail($request->user()->id);
        if ($two_factor) {

            $user->two_factor = $two_factor == 'true' ? 'enabled' : 'disabled';
            $user->save();
        } else {

            //destroy the previous token
            $destroy = (new SecurityToken())->destroy($request->user()->id, 'two-factor');
        }

        return response()->json([
            ' status' => 'success',
            'message' => 'QR code generated successfully',
            'two_factor' => $two_factor,
            'data' => $this->store($request->user()),
            'user' => $user,
        ]);
    }
}
