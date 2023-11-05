<?php

namespace App\Http\Controllers;

use App\Models\TransactionLog;
use App\Http\Requests\StoreTransactionLogRequest;
use App\Http\Requests\UpdateTransactionLogRequest;

class TransactionLogController extends Controller
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
    public function store(StoreTransactionLogRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TransactionLog $transactionLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TransactionLog $transactionLog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTransactionLogRequest $request, TransactionLog $transactionLog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TransactionLog $transactionLog)
    {
        //
    }
}
