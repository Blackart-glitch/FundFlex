<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\RedirectResponse;
use App\http\Controllers\MailController;
use App\http\Controllers\SecurityTokenController;


class VerifyEmailController extends Controller
{



    /**
     * Mark the authenticated user's email address as verified.
     */
    public function __invoke(EmailVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedEmail()) {
            return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
    }


    public function send_token($token)
    {
        $user = Auth()->user();

        $data = [
            'name' => $user->Firstname,
            'email' => $user->email,
            'code' => $token
        ];

        $response = (new MailController())->sendregisterationEmail($data);

        return $response;
    }

    public function validate_token(Request $request)
    {
        $token = $request->all()['code'];
        $user = Auth()->user();

        $record = (new SecurityTokenController)->find($user->id);

        if ($record->token_value == $token) {

            //marks the email as verified
            if ($request->user()->markEmailAsVerified()) {
                event(new Verified($request->user()));

                //deletes the token from the database
                $record->delete();

                return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');
            } else {
                //sends a new token to the user

                $this->send_token($token);

                //returns and error and goes back to the page
                return redirect()->back()->withErrors(['token' => "Some error occured, let's try that again"]);
            }
        } else {
            //returns and error and goes back to the page
            return redirect()->back()->withErrors(['token' => 'The token is invalid']);
        }
    }

    public function request_token()
    {
        $user = Auth()->user();

        $token = (new SecurityTokenController)->store($user->id);

        $this->send_token($token);

        return redirect()->back()->with('message', 'A new token has been sent to your email');
    }
}
