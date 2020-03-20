<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    public $fillable=[
        'fileName','uploadedBy','BelongsTo','Subject','Marked','status'
    ];
}
