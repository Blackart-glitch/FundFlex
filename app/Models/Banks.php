<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banks extends Model
{
    use HasFactory;
    /*  $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('code');
            $table->string('longcode')->nullable();
            $table->boolean('pay_with_bank');
            $table->boolean('active');
            $table->string('country');
            $table->string('currency');
            $table->string('type'); */
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
