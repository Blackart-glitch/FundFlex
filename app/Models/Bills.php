<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'name',
        'category',
        'amount',
        'attachments',
        'type'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
