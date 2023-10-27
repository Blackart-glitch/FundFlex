<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\SecurityTokenController;
use App\Http\Controllers\Auth\VerifyEmailController;

class EmailVerificationNotificationController extends Controller
{
    /**
     * Send a new email verification notification.
     */
    public function store(Request $request) //: RedirectResponse         //previous response hint but removed for ajax calls
    {
        if ($request->user()->hasVerifiedEmail()) {
            //   return redirect()->intended(RouteServiceProvider::HOME . '?verified=1');      //removed to handle ajax calls
            return response()->json([
                'message' => 'Success',
                'redirect' => RouteServiceProvider::HOME . '?verified=1'
            ]);
        }

        $user = $request->user();

        //creates a token for the user
        $token = (new SecurityTokenController())->store($user->id);

        //sends a token to the authenticated user's email address
        $response = (new VerifyEmailController())->send_token($token);

        return response()->json(['message' => 'Verification link sent']);
    }
}
