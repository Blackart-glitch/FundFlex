<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionCategoryMapping extends Model
{
    use HasFactory;

    protected $table = 'transaction_category_mapping';

    protected $fillable = [
        'transaction_id',
        'category_id',
        'created_at',
        'updated_at',
    ];

    // Define relationships, if any
}
