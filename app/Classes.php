<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    public  $fillable=[
        'level','className','status'
    ];
}
