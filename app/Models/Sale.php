<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    //


    protected $fillable = [
        'date',
        'customer_name',
        'income_type',
        'quantity',
        'price',
        'total_amount',
        'payment_status',
        'note'
    ];
}
