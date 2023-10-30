<?php

namespace App\Http\Controllers;

use App\Models\Banks;
use App\Http\Requests\StoreBanksRequest;
use App\Http\Requests\UpdateBanksRequest;

class BanksController extends Controller
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
    public function store(StoreBanksRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Banks $banks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banks $banks)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBanksRequest $request, Banks $banks)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banks $banks)
    {
        //
    }
}
