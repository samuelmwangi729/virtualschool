<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public  $fillable=[
        'level','subjectCode','subjectName','status'
    ];
}
