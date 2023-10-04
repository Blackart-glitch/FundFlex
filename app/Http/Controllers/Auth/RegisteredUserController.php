<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\wallet;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // Validate the request data, including Firstname, Lastname, and Phone
        $request->validate([
            'Firstname' => ['required', 'string', 'max:255'],
            'Lastname' => ['required', 'string', 'max:255'],
            'Phone' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        // dd($request);

        // Create a new user record, including Firstname, Lastname, and Phone
        $user = User::create([
            'Firstname' => $request->Firstname,
            'Lastname' => $request->Lastname,
            'Phone' => $request->Phone, // You can omit this line if Phone is nullable
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Create a wallet record for the user (balance is already 0.00 by default)
        Wallet::create([
            'user_id' => $user->id,
        ]);

        // Trigger the "Registered" event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        // Redirect to the home page after successful registration
        return redirect(RouteServiceProvider::HOME);
    }
}
