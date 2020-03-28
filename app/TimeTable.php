<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TimeTable extends Model
{
    public $fillable=[
        'Week',
        'Subject1',
        'Subject2',
        'Subject3'
    ];
}
