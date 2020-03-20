<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $fillable=[
        'level','class','subject','question','marks','status','topic'
    ];
}
