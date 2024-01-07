<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bills;
use App\Models\bill_mapping;
use GuzzleHttp\Psr7\Response;
use Psy\Util\Json;

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

        $userBills = collect($user->bills)->map(function ($bill) {
            return $this->checkIfBillIsLinked($bill);
        });

        $allBills = Bills::all()->map(function ($bill) {
            return $this->checkIfBillIsLinked($bill);
        });

        $bills = [
            'user' => $userBills,
            'all' => $allBills,
        ];
        return $bills;
    }

    public function checkIfBillIsLinked($bill)
    {
        $user = Auth::user();

        $link = bill_mapping::where('bill_id', $bill->id)->where('user_id', $user->id)->first();

        if ($link) {
            $bill->linked = true;
        } else {
            $bill->linked = false;
        }
        return $bill;
    }

    public function getBill($id)
    {
        $bill = Bills::find($id);

        return $bill;
    }

    public function linkToUser(Request $request)
    {
        $user = Auth::user();

        $bill = Bills::findOrFail($request->bill_id);

        $link = bill_mapping::firstOrCreate(
            ['bill_id' => $bill->id, 'user_id' => $user->id],
            ['status' => 'active']
        );

        if ($link->wasRecentlyCreated) {
            return response()->json([
                'status' => 'success',
                'message' => 'Bill linked to user successfully',
                'data' => $link,
            ], 200);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Bill already linked to user',
                'data' => null,
            ]);
        }
    }

    public function unlinkFromUser(Request $request)
    {
        $user = Auth::user();

        try {
            $bill = Bills::where('id', $request->bill_id)->firstOrFail();
            $link = bill_mapping::where('bill_id', $bill->id)->where('user_id', $user->id)->firstOrFail();
            $link->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Bill unlinked from user successfully',
                'data' => $link,
            ], 200);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Bill not found or not linked to user',
                'data' => null,
            ]);
        }
    }
}
