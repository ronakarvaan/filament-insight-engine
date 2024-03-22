<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResourceCategory extends Model
{

    protected $table = "resource_category";
    protected $primaryKey = 'resource_cat_id';
    protected $fillable = [
        'name',
        'description',
        'category_image',
        'main_cat_id',
        'is_delete',
        'created_at',
        'updated_at',
        'assign_category',
    ];

}
