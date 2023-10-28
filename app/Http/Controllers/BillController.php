<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;
use App\Http\Controllers\BillController;

class BillsController extends Controller
{
    public function getbills()
    {
        $bills = Bills::all()->sortBy('updated_at')->reverse();
        return $bills;
    }
}
