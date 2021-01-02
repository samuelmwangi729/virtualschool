<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable=[
        'Owner',
        'Class',
        'TimeIn',
        'TimeOut',
        'UsualNumber',
        'PresentNumber',
        'Subject',
        'Topic',
        'Date',
        'Objectives',
        'Evaluation',
    ];
}
