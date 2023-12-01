<?php

namespace App\Http\Controllers\Auth;

//controllers
use App\Http\Controllers\Controller;
use App\Http\Controllers\SecurityTokenController;
use App\Http\Controllers\Auth\VerifyEmailController;
//models
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules;
use Illuminate\View\View;



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

        // Trigger the "Registered" event
        event(new Registered($user));

        // Log in the newly registered user
        Auth::login($user);

        //creates a token for the user
        $token = (new SecurityTokenController())->store($user->id);

        //sends a token to the authenticated user's email address
        $response = (new VerifyEmailController())->send_token($token);

        if ($response['status'] === true) {
            //redirect to the email verification page with the user data
            return redirect()->route('verification.notice');
        } else {
            // Set a success message
            Session::flash('error_status', 'There was a problem sending a verification code to your email address. Please try again.');

            return redirect()->route('verification.notice');
        }
    }

    public function show($id)
    {
        return User::find($id);
    }
}
