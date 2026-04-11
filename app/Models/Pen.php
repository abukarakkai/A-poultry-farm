<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pen extends Model
{
    //

protected $fillable = [
    'name',
    'capacity',
    'initial_birds',
    'start_date',
    'type',
    'status',
    'notes'
];

public function records()
{
    return $this->hasMany(\App\Models\Record::class, 'pen_id');
}
}



