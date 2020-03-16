<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $fillable=[
        'TransactionId',
        'ClientNumber',
        'AccountName',
        'Amount',
        'Status'
    ];
}
