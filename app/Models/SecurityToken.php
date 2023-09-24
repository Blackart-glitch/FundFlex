<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecurityToken extends Model
{
    use HasFactory;

    protected $table = 'security_tokens';

    protected $fillable = [
        'user_id',
        'token_value',
        'expiration_time',
    ];

    // Define relationships, if any
}
