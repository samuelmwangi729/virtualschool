<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Marked extends Model
{
    public $fillable=[
        'fileName','uploadedBy','BelongsTo','Subject','status'
    ];
}
