<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = [

    'pen_id',
    'record_date',
    'eggs_collected',
    'cracks',
    'feed_given',
    'cull',
    'mortality',
    'water',
    'notes'

    ];
    

    public function pen()
    {
        return $this->belongsTo(Pen::class, 'pen_id');
    }

    protected $casts = [
    'record_date' => 'date',
];


}