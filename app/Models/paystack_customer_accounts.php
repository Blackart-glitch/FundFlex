<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paystack_customer_accounts extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'customer_code',
    ];
}
