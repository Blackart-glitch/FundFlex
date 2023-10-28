<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Http\Requests\StorewalletRequest;
use App\Http\Requests\UpdatewalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WalletController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->middleware('auth');
        $this->user = Auth::user();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $wallet = $this->getWallet($this->user->id);
        $Bills = $this->getBills($this->user->id);

        return view('wallet', [
            'wallet' => $wallet,
        ]);
    }

    //get wallet details from database for a user
    public function getWallet($user_id)
    {
        $wallet = wallet::where('user_id', $user_id)->first();

        return $wallet;
    }
}
