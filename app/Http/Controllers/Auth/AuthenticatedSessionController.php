<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

use App\Http\Controllers\SecurityTokenController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\mailcontroller;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\TwoFactorAuthentication;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {



        $request->authenticate();

        $request->session()->regenerate();

        if ($request->user()->status == 'inactive' || $request->user()->status == 'deleted') {
            Auth::logout();
            return redirect()->route('login')->with('error', 'Your account is inactive or suspended. Please contact support for assistance.');
        }

        if ($request->user()->hasVerifiedEmail()) {

            if ((new TwoFactorAuthentication())->Is2faEnabled($request->user())) {

                //redirect to the 2fa page with the QR code and token
                return redirect()->route('two-factor');
            } else {
                /* send transactional mail */
                $data = [
                    'name' => $request->user()->Firstname,
                    'email' => $request->user()->email,
                    'code' => $request->user()->code,
                    'message' => 'You have successfully logged in to your account. Ensure you put on a 2FA for your account security.'
                ];

                (new mailcontroller())->sendTransactionalMail($data);

                return redirect()->intended(RouteServiceProvider::HOME . '?two_factor=1&logged_in=1');
            }
        } else {
            //creates a token for the user
            $token = (new SecurityTokenController())->store($request->user()->id, false);

            //sends a token to the authenticated user's email address
            $response = (new VerifyEmailController())->send_token($token);

            if ($response['status'] !== true) {
                // Set a success message
                Session::flash('error_status', 'There was a problem sending a verification code to your email address. Please try again.');
            }

            return redirect()->route('verification.notice');
        }
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
