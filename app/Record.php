<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    public $fillable=[
        'School','Owner','Subject','Class','Date','Week','Lesson','Topic','Reference','Remarks'
    ];
}
