<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Models\Wallet;
use App\Http\Controllers\WalletController;
use App\Http\Requests\RetrieveBanksRequest;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class BanksController extends Controller
{
    protected $client;
    public function __construct()
    {
        $this->middleware('auth');
        $this->client = new Client();
    }

    /**
     * The function retrieves banks based on the provided bank name or returns all banks in chunks of 10
     * if no bank name is provided.
     *
     * @param RetrieveBanksRequest request The  parameter is an instance of the
     * RetrieveBanksRequest class. It is used to retrieve the input data from the HTTP request made to the
     * get_banks() function.
     *
     * @return a JSON response. If the 'BankName' parameter is not provided, it will return all banks in
     * chunks of 10. If the 'BankName' parameter is provided, it will search for banks whose name is
     * similar to the provided 'BankName' and return them as a JSON response.
     */
    public function get_banks(RetrieveBanksRequest $request)
    {
        // Get the 'bank-code' parameter from the request
        $BankName = $request->input('BankName');

        // If 'bank-code' is not provided, return all banks in chunks of 10
        if ($BankName === null) {
            return response()->json(Banks::all()->chunk(10));
        }

        // Search for banks whose name is similar to the provided 'bank-code'
        $banks = Banks::where('name', 'LIKE', '%' . $BankName . '%')->get();

        return response()->json($banks);
    }


    /**
     * The function `verify_bank_account` verifies a bank account by performing a lookup on the bank
     * account number and returns a JSON response with the verification status and additional data if
     * successful.
     *
     * @param RetrieveBanksRequest request The  parameter is an instance of the
     * RetrieveBanksRequest class, which is used to retrieve the bank code and account number from the
     * request input.
     *
     * @return a JSON response. The response contains a status indicating whether the account number
     * verification was successful or not, a message providing additional information about the
     * verification status, and data related to the bank account if the verification was successful.
     */
    public function verify_bank_account(RetrieveBanksRequest $request)
    {
        $bank_code = $request->input('bankCode');
        $account_number = $request->input('accountNumber');

        $bank = Banks::where('code', $bank_code)->first();
        if ($bank === null) {
            return response()->json([
                'status' => false,
                'message' => 'Bank not found',
            ], 404);
        } else {
            $BankName = $bank->name;
            try {
                //perform a lookup on the bank account number
                $response = $this->PaystackLookup($bank_code, $account_number);

                if ($response['status'] === true) {
                    $response['data']['bank_name'] = $BankName;
                    return response()->json([
                        'status' => true,
                        'message' => 'Account number verified successfully',
                        'data' => $response['data']
                    ], 200);
                } else {
                    return response()->json([
                        'status' => false,
                        'message' => 'Account number not verified',
                    ]);
                }
            } catch (\Throwable $th) {
                return response()->json([
                    'status' => false,
                    'message' => 'An error occured while verifying account number',
                    'paysack_error' => $th->getMessage(),

                ], 500);
            }
        }
    }

    /**
     * The function retrieves wallet information based on the provided wallet code or returns all wallets
     * in chunks of 10 if no wallet code is provided.
     *
     * @param RetrieveBanksRequest request The  parameter is an instance of the
     * RetrieveBanksRequest class. It is used to retrieve the 'WalletCode' parameter from the request.
     *
     * @return a JSON response. If the 'WalletCode' parameter is not provided, it returns all wallets in
     * chunks of 10. If the 'WalletCode' parameter is provided, it searches for wallets whose account
     * number is similar to the provided 'WalletCode' and returns them.
     */
    public function get_wallet(RetrieveBanksRequest $request)
    {
        // Get the 'bank-code' parameter from the request
        $WalletCode = $request->input('WalletCode');

        if ($WalletCode === null) {
            return response()->json(['status' => false, 'message' => 'Invalid wallet. Please check and try again']);
        }

        $wallet = Wallet::where('account_number', $WalletCode)->first();

        if ($wallet !== null) {
            //get user details from wallet
            $wallet->user();


            return response()->json([
                'status' => true,
                'message' => 'Wallet found',
                'data' => [
                    'name' => $wallet->user->Firstname . ' ' . $wallet->user->Lastname
                ]
            ], 200);
        } else {

            return response()->json([
                'status' => false,
                'message' => 'Invalid wallet. Please check and try again'
            ]);
        }
    }


    /**
     * The function `PaystackLookup` makes a GET request to the Paystack API to resolve a bank account
     * number and bank code combination.
     *
     * @param code The code parameter represents the bank code of the bank you want to lookup. This code is
     * specific to each bank and is used to identify the bank in the Paystack API.
     * @param number The "number" parameter is the bank account number that you want to look up.
     *
     * @return the response from the Paystack API after making a GET request to the specified URL. The
     * response is being decoded from JSON format to an associative array using `json_decode()`.
     */
    public function PaystackLookup($code, $number)
    {
        $response = $this->client->request('GET', 'https://api.paystack.co/bank/resolve?account_number=' . $number . '&bank_code=' . $code, [
            'headers' => [
                'Authorization' => 'Bearer ' . env('PAYSTACK_SECRET_KEY'),
            ],
        ]);

        $response = json_decode($response->getBody()->getContents(), true);

        return $response;
    }
}
