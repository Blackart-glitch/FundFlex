<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Bills extends Model
{
    use HasFactory;

    protected $table = 'bills';

    protected $fillable = [
        'title',
        'description',
        'amount',
        'due_date',
        'status',
        'payment_method',
        'reference',
        'late_fee',
        'discounts',
        'tax',
        'type',
        'billing_period',
        'category_id'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'bill_mappings', 'bill_id', 'user_id');
    }
}
