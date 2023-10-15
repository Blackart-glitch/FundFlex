<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction_category_stages extends Model
{
    use HasFactory;
    protected $fillable = ['category_id', 'name', 'description'];
}
