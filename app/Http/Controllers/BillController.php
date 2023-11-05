<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;

class BillController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getuserbills()
    {
        $user = Auth::user();
        $bills = $user->bills;

        return $bills;
    }

    public function getallbills()
    {
        $user = Auth::user();

        $userBills = collect($user->bills);

        $bills = [
            'user' => $userBills,
            'all' => Bills::all(),
        ];


        return $bills;
    }
}
