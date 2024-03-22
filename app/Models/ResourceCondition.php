<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ResourceCondition extends Model
{

    protected $table = "resource_condition";
    protected $primaryKey = "resource_condition_id";
    protected $appends = ['is_tack'];

    protected $fillable = [
        'condition_name',
        'condition_redirect',
    ];

    public function getIsTackAttribute()
    {
        if (Auth::check()) {
            $data = UserResourceCondition::where('condition_id', $this->resource_condition_id)->where("user_id", Auth::user()->id)->where("is_delete", "0")->first();
            if (!empty($data)) {
                return "1";
            }
        }
        return "0";
    }

}
