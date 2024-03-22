<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AppNotification extends Model {

    protected $table = "app_notification";

    protected $fillable = [
            'user_id','title','content','is_delete','title_welsh','content_welsh'
    ];
}
