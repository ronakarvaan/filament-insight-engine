<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ResourceExpert extends Model
{

    protected $table = "resource_expert";
    protected $primaryKey = "resource_expert_id";
    protected $appends = ['is_tack'];

    public function getIsTackAttribute()
    {
        // if (Auth::check()) {
        //     $data = UserResourceCondition::where('condition_id', $this->resource_expert_id)->where("user_id", Auth::user()->id)->where("is_delete", "0")->first();
        //     if (!empty($data)) {
        //         return "1";
        //     }
        // }
        // return "0";
        return "1";
    }

}
