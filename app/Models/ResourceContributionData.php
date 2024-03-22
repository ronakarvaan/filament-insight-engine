<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceContributionData extends Model
{
    protected $table = "resource_contribution_data";
    protected $primaryKey = "resource_contribution_id";
    public function getContributionImageAttribute($value)
    {
        if (empty($value)) {
            return "";
        }
        return s3Url(RESOURCECONTRIBUTIONIMAGES3 . $value);
    }
}
