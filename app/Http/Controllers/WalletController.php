<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Http\Requests\StorewalletRequest;
use App\Http\Requests\UpdatewalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BillController;

class WalletController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $wallet = $this->getWallet($user->id);
        $bills = (new BillController())->getuserbills();

        return view('wallet', [
            'wallet' => $wallet,
            'bills' => $bills,
        ]);
    }

    //get wallet details from database for a user
    public function getWallet($user_id)
    {
        $wallet = wallet::where('user_id', $user_id)->first();

        return $wallet;
    }
}
