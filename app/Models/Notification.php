<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model {

    protected $table = "notification";
     protected $fillable = [
            'notification_title','notification_title_welsh','notification_content','notification_content_welsh','notification_date','is_send',
    ];
}




