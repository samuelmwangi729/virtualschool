<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Suspend extends Model
{
    public $fillable=[
        'id',
        'status'
    ];
}
