<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Transation extends Model
{

    protected $table = 'user_transaction';
    protected  $fillable = [
        'user_id',
        'transaction_id',
        'duraction',
        'original_transaction_id',
        'device_type',
        'receipt_data',
        'purchase_date',
        'start_date',
        'expire_date',
        'status'
    ];
}
