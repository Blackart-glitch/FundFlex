<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategory extends Model
{
    use HasFactory;

    protected $table = 'transaction_categories';

    protected $fillable = [
        'category_name',
    ];

    // Define relationships, if any
}
