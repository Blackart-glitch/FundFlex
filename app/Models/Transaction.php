<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $table = 'transactions';

    protected $fillable = [
        'user_id',
        'transaction_type',
        'amount',
        'currency_id',
        'timestamp',
        'status',
        'created_at',
        'updated_at',
    ];

    // Define relationships, if any
}