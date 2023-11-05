<?php

namespace App\Http\Controllers;

use App\Models\wallet;
use App\Http\Requests\StorewalletRequest;
use App\Http\Requests\UpdatewalletRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BillController;
use App\Models\Currency;

class WalletController extends Controller
{
    protected $user;

    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * The index function retrieves the authenticated user, their wallet, bills, and currencies, and passes
     * them to the wallet view.
     *
     * @return a view called 'wallet' with the following data:
     */
    public function index()
    {
        $user = auth()->user();
        $wallet = $this->getWallet($user->id);
        $bills = (new BillController())->getuserbills();
        $currency = Currency::all();

        return view('wallet', [
            'user' => $user,
            'wallet' => $wallet,
            'bills' => $bills,
            'currencies' => $currency,
        ]);
    }


    /**
     * The getWallet function retrieves the wallet information for a specific user.
     *
     * @param user_id The user_id parameter is the unique identifier of the user for whom we want to
     * retrieve the wallet information.
     *
     * @return the wallet object for the specified user ID.
     */
    public function getWallet($user_id)
    {
        $wallet = wallet::where('user_id', $user_id)->first();

        return $wallet;
    }
}
