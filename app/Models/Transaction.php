<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $fillable = [
        'transaction_date',
        'description',
        'amount',
        'transaction_type',
    ];
}