<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MarkingScheme extends Model
{
    public $fillable=[
        'Subject',
        'FileName',
        'Status'
    ];
}
