<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    public $fillable=[
        'uid',
        'title',
        'Description',
        'status'
    ];
}
