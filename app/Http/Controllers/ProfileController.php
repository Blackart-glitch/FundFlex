<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\paystack_customer_accounts;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\SecurityTokenController;

class ProfileController extends Controller
{

    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user();
        $user->merchant_id = paystack_customer_accounts::where('user_id', $user->id)->first()->customer_code ?? 'Not Available';

        return view('settings', [
            'user' => $user,
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {

        if ($request->hasFile('photo')) {
            //renames the file to the user's id
            $request->file('photo')->storeAs('public/Avatars', $request->user()->id . '.jpg');

            //update the users avatar_url
            $request->user()->avatar = $request->user()->id . '.jpg';
            $request->user()->save();
        } elseif ($request->has('email')) {

            //set the user's email to unverified
            $request->user()->email_verified_at = null;
            $request->user()->email = $request->email;
            $request->user()->save();

            //generate security token
            $token = (new SecurityTokenController())->store($request->user()->id);

            //sends a verification email to the user
            $response = (new VerifyEmailController())->send_token($token);

            if ($response['status'] == true) {
                return Redirect::route('verification.notice')->with('status', 'verification email sent for ' . $request->user()->email);
            }
        } elseif ($request->has('phone')) {
            $request->user()->phone = $request->phone;
            $request->user()->save();
        }

        return Redirect::route('settings')->with('status', 'Profile updated.');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {

        //verify the user's hashed password against the one in the database
        if (Hash::check($request->confirmPassword, $request->user()->password)) {
            $user = $request->user();

            Auth::logout();

            //$user->delete();

            $user->status = 'deleted';
            $user->save();

            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return Redirect::to('/');
        }

        /* $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);
 */
        return Redirect::route('settings')->withErrors([
            'password' => __('This password does not match our records.'),
        ]);
    }
}
