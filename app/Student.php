<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    public $fillable=[
        'studentNames',
        'SchoolAffiliate',
        'UniqueIdentifier',
        'Passport',
        'status'
    ];
}
