<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;
use App\Http\Controllers\BillController;

class BillsController extends Controller
{
    public function getuserbills()
    {
        $user = Auth::user();
        $bills = Bills::where('user_id', $user->id)->get();
        return $bills;
    }
}
