<?php

namespace App\Http\Controllers;

use App\Models\SecurityToken;
use App\Http\Requests\StoreSecurityTokenRequest;
use App\Http\Requests\UpdateSecurityTokenRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class SecurityTokenController extends Controller
{
    /**
     * Generate a security token of 7 digits and two letters.
     *
     * @return string
     */
    private function generateToken()
    {
        return rand(1000000, 9999999)
            . Str::random(1)
            . Str::random(1);
    }


    /**
     * The store function generates a new token and stores it in the database, either for two-factor
     * authentication or email verification.
     *
     * @param id The "id" parameter represents the user ID for which the token is being generated and
     * stored.
     * @param two_factor The parameter `` is a boolean value that determines whether the
     * token being generated is for two-factor authentication or not. If it is set to `true`, it means
     * the token is for two-factor authentication. If it is set to `false` or not provided, it means
     * the token is
     *
     * @return the value of the generated token.
     */
    public function store($id, $two_factor = false)
    {

        // Generate a new token
        $tokenValue = $this->generateToken();

        //finds all tokens for the user and deletes them
        if ($two_factor) {
            // Get the user's token record
            $token = SecurityToken::where('user_id', $id)->where('token_type', 'two-factor')->first();

            if ($token !== null && $token->expiration_time > Carbon::now()) {
                // The token exists and is not expired, so you don't need to generate a new one.
                return $token->token_value;
            } else {
                // The token has expired or doesn't exist, so generate a new one.
                $tokenValue = $this->generateToken();
                // Set the expiration time (e.g., 1 month from now)
                $expirationTime = Carbon::now()->addWeek(1);

                $record = [
                    'user_id' => $id,
                    'token_value' => $tokenValue,
                    'expiration_time' => $expirationTime,
                    'token_type' => 'two-factor'
                ];

                // Create a new SecurityToken record in the database
                SecurityToken::create($record);

                return $tokenValue;
            }
        } else {
            $this->destroy($id, 'email_token');

            // Set the expiration time (e.g., 10 minutes from now)
            $expirationTime = Carbon::now()->addMinutes(10);

            $record = [
                'user_id' => $id,
                'token_value' => $tokenValue,
                'token_type' => 'email_token',
                'expiration_time' => $expirationTime,
            ];

            // Create a new SecurityToken record in the database
            SecurityToken::create($record);
        }

        return $tokenValue;
    }


    /**
     * Remove the specified token from storage.
     *
     * @param SecurityToken $securityToken
     * @return void
     */
    public function destroy($user, $type = 'email_token')
    {
        // Find the token in the database
        $token = SecurityToken::where('user_id', $user)->where('token_type', $type)->first();

        if ($token) {
            // Delete the token
            $token->delete();
        }
    }


    /**
     * The function finds the latest security token for a given user ID and deletes all other tokens.
     *
     * @param userId The `userId` parameter is the ID of the user for whom we want to find the latest
     * security token.
     *
     * @return the latest (or only) security token for the given user ID.
     */
    public function find($userId, $type = 'email_token')
    {
        $tokens = SecurityToken::where('user_id', $userId)->where('token_type', $type)->orderBy('created_at', 'desc')->get();

        if ($type === 'email_token') {
            if ($tokens->count() > 1) {
                // Delete all tokens except the latest one
                $tokensToDelete = $tokens->slice(1);
                foreach ($tokensToDelete as $token) {
                    $token->delete();
                }
            }

            // Get the latest (or only) token
            $latestToken = $tokens->first();
        } elseif ($type === 'two-factor') {
            $latestToken = $tokens->first();
        }

        return $latestToken;
    }
}
