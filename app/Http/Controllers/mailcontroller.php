<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;
use App\Mail\regmail;
use App\Mail\verifymail;

class MailController extends Controller
{
    public function sendTestEmail()
    {
        $data = [
            'name' => "Jacob",
            'code' => 1234576849586
        ];

        Mail::to('danielajiboye1@gmail.com')->send((new regmail($data)));

        return "Test email sent successfully!";
    }

    public function sendVerifyEmail($data)
    {
        $data = [
            'name' => $data->Firstname,
            'email' => $data->email,
            'code' => $data->code
        ];

        try {
            Mail::to($data['email'])->send((new verifymail($data)));

            return [
                'status' => true,
                'message' => 'Email sent successfully!'
            ];
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function sendResetEmail($data, $code)
    {
        $data = [
            'name' => $data['name'],
            'code' => $code
        ];

        try {
            Mail::to($data['email'])->send((new verifymail($data)));

            return [
                'status' => true,
                'message' => 'Email sent successfully!'
            ];
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function sendregisterationEmail($data)
    {
        try {
            Mail::to($data['email'])->send((new regmail($data)));

            return [
                'status' => true,
                'message' => 'Email sent successfully!'
            ];
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
