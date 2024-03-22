<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAppointment extends Model
{
    protected $table = 'user_appointment';
    protected  $fillable = [
       'user_id','appointment_type','date','location','from_time','to_time','note','is_delete'//,'cycle_id','cycle_name'
    ];
}
