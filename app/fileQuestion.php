<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fileQuestion extends Model
{
    public $fillable=[
        'level','class' ,'subject' ,'questionfile' ,'topic' 
    ];
}
