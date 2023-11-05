<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'code',
        'longcode',
        'pay_with_bank',
        'status',
        'country',
        'country_code',
        'currency',
        'type',
    ];
}
