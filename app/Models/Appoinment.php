<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appoinment extends Model
{
    protected $table = 'appoinment_type';
    protected  $fillable = [
       'type_name','is_delete','image'
    ];
}
