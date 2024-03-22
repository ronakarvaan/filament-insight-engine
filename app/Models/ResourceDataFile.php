<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceDataFile extends Model
{
    protected $table = "resource_data_file";
    protected $primaryKey = 'resource_file_id';

    public function getVideoUrlAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return $value;
    }
    public function getVideoThumbAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return $value;
    }
    public function getVideoMinAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return $value;
    }
    public function getVideoHourAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return $value;
    }
    public function getVideoSecAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return $value;
    }
    public function getResourceFileAttribute($value)
    {
        if (!empty($value)) {
            if ($this->resource_file_type == "image") {
                return s3Url(RESOURCEIMAGES3 . $value);
            }
        } else {
            return "";
        }
        return $value;
    }

}
