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

    /**
     * The GetAuthorizationUrl function sends a POST request to a payment URL with the provided email,
     * amount, and reference ID, and returns the authorization URL from the response.
     *
     * @param email The email parameter is the email address of the user who is making the payment.
     * @param amount The "amount" parameter represents the amount of money that needs to be authorized for
     * the transaction. It is usually specified in the currency of the payment system being used (e.g.,
     * dollars, euros, etc.).
     * @param referenceid The referenceid parameter is used to uniquely identify a transaction. It can be
     * any string or number that you choose to associate with the transaction. It is typically used to
     * track and reference the transaction in your system.
     *
     * @return an array with two keys: 'status' and 'data'. The value of 'status' indicates whether the
     * request was successful or not. If the request was successful, the value of 'status' will be true. If
     * there was an error, the value of 'status' will be false.
     */
    public function GetAuthorizationUrl($email, $amount, $referenceid)
    {
        $url = $this->payment_url . '/transaction/initialize';

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

    /**
     * The function `verifyTransaction` sends a GET request to a payment URL with a reference ID and
     * returns the response body as a JSON object.
     *
     * @param referenceid The `referenceid` parameter is the unique identifier for the transaction that you
     * want to verify. It is used to identify the specific transaction that you want to check the status
     * of.
     *
     * @return the response body as a JSON object.
     */
    public function verifyTransaction($referenceid)
    {
        $url = url($this->payment_url . '/transaction/verify/' . $referenceid);

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

    /**
     * The function `createTransferRecipient` in PHP creates a transfer recipient with the given account
     * number, bank code, and name.
     *
     * @param account_number The account number is the bank account number of the recipient to whom you
     * want to transfer funds. It is a unique identifier for the recipient's bank account.
     * @param bank_code The `bank_code` parameter refers to the code that identifies the bank where the
     * recipient's account is held. It is usually a unique code assigned to each bank by the Central Bank
     * of Nigeria (CBN). For example, the bank code for Access Bank is 044, for Zenith Bank is
     * @param name The name of the transfer recipient, i.e., the person or entity to whom the transfer will
     * be made.
     *
     * @return an array with two keys: 'status' and 'data'. The value of 'status' indicates whether the
     * operation was successful or not. If 'status' is true, the 'data' key will contain an array with two
     * keys: 'recipient_code' and 'data'. 'recipient_code' is the code for the created transfer recipient,
     * and 'data' contains the full
     */
    public function createTransferRecipient($account_number, $bank_code, $name)
    {
        $url = $this->payment_url . '/transferrecipient';

        $body = [
            'type' => 'nuban',
            'name' => $name,
            'account_number' => $account_number,
            'bank_code' => $bank_code,
            'currency' => 'NGN',
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
                    'recipient_code' => $response_body['data']['recipient_code'],
                    'data' => $response_body['data'],
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

    /**
     * The above function initiates a transfer of a specified amount to a recipient using a payment URL and
     * returns the transfer code and data if successful, or an error message if unsuccessful.
     *
     * @param amount The amount parameter represents the amount of money to be transferred. It is the value
     * that will be deducted from the sender's balance and transferred to the recipient.
     * @param recipient_code The recipient_code parameter is used to specify the recipient of the transfer.
     * It is a unique identifier for the recipient, typically provided by the payment service or platform
     * you are using.
     * @param referenceid The `referenceid` parameter is used to provide a unique identifier for the
     * transfer. It can be any string value that helps you identify the transfer later on.
     * @param reason The "reason" parameter is used to provide a description or explanation for the
     * transfer. It can be used to specify the purpose of the transfer, such as "payment for services
     * rendered" or "refund for cancelled order".
     *
     * @return an array with two keys: 'status' and 'data'. The value of 'status' indicates whether the
     * transfer was successful or not. If the transfer was successful, the value of 'status' will be true.
     * If there was an error during the transfer, the value of 'status' will be false.
     */
    public function initiateTransfer($amount, $recipient_code, $referenceid, $reason)
    {
        $url = $this->payment_url . '/transfer';

        $body = [
            'source' => 'balance',
            'amount' => $amount,
            'recipient' => $recipient_code,
            'reference' => $referenceid,
            'reason' => $reason,
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
                    'transfer_code' => $response_body['data']['transfer_code'],
                    'data' => $response_body['data'],
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
}
