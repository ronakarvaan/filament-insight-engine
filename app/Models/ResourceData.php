<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class ResourceData extends Model
{

    protected $table = "resource_data";
    protected $primaryKey = 'resource_id';

    public function resourcecycle()
    {
        return $this->hasMany(ResourceCycleData::class, "resource_id", "resource_id")->where("is_delete", "0")->orderBy("resource_cycle_id","DESC");
    }

    public function resourcecondition()
    {
        return $this->hasMany(ResourceDataCondition::class, "resource_id", "resource_id")->where("is_delete", "0");
    }

    public function resourcereport()
    {
        return $this->hasMany(ResourceReportType::class, "resource_id", "resource_id")->where("is_delete", "0");
    }

    public function resourcecontribution()
    {
        return $this->hasMany(ResourceContributionData::class, "resource_id", "resource_id")->where("is_delete", "0");
    }
    
    public function resourcefiledata()
    {
        return $this->belongsTo(ResourceDataFile::class, "resource_file_id", "resource_file_id")->where("is_delete", "0");
    }

    public function resourceCategoryData()
    {
        return $this->belongsTo(ResourceCategory::class, "resource_category", "resource_cat_id")->where("is_delete", "0");
    }
    protected $appends = ['is_save', 'is_new'];

    public function getIsSaveAttribute()
    {
        if (Auth::check()) {
            $data = UserResourceSave::where("user_id", Auth::user()->id)->where("resource_id", $this->resource_id)->where("is_delete", "0")->first();
            if (!empty($data)) {
                return "1";
            }
        }
        return "0";
    }
    public function getIsNewAttribute()
    {
        if (Auth::check() && Auth::user()->user_type != "Admin") {
            $data = UserResourceData::where("user_id", Auth::user()->id)->where("resource_id", $this->resource_id)->where("is_delete", "0")->orderBy("id", "DESC")->first();
            if (!empty($data)) {
                $todaydate = Carbon::createFromTimestamp(strtotime(date("Y-m-d") . " 12:00:00"), Auth::user()->time_zone ?? 'America/Los_Angeles');
                $startdate = Carbon::createFromTimestamp(strtotime($data->created_at), Auth::user()->time_zone ?? 'America/Los_Angeles');
                $diffday = $startdate->diffInDays($todaydate) + 1;
                if ($diffday <= 4 && strtotime($todaydate->format("Y-m-d")) >= strtotime($startdate->format("Y-m-d"))) {
                    return "1";
                }
            } else {
                $todaydate = Carbon::createFromTimestamp(strtotime(date("Y-m-d") . " 12:00:00"), Auth::user()->time_zone ?? 'America/Los_Angeles');
                $startdate = Carbon::createFromTimestamp(strtotime($this->created_at), Auth::user()->time_zone ?? 'America/Los_Angeles');
                $diffday = $startdate->diffInDays($todaydate) + 1;
                if ($diffday <= 4 && strtotime($todaydate->format("Y-m-d")) >= strtotime($startdate->format("Y-m-d"))) {
                    return "1";
                }
            }

        }
        return "0";
    }

}
