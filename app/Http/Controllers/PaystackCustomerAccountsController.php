<?php

namespace App\Http\Controllers;

use App\Models\paystack_customer_accounts;
use App\Http\Requests\Storepaystack_customer_accountsRequest;
use App\Http\Requests\Updatepaystack_customer_accountsRequest;

class PaystackCustomerAccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storepaystack_customer_accountsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(paystack_customer_accounts $paystack_customer_accounts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(paystack_customer_accounts $paystack_customer_accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatepaystack_customer_accountsRequest $request, paystack_customer_accounts $paystack_customer_accounts)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(paystack_customer_accounts $paystack_customer_accounts)
    {
        //
    }
}
