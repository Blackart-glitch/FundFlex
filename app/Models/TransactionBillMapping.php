<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionBillMapping extends Model
{
    use HasFactory;

    protected $table = 'transaction_bill_mapping';

    protected $fillable = [
        'transaction_id',
        'bill_id',
    ];

    // Define relationships, if any
}
