<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClinic extends Model
{
    use HasFactory;
    protected $fillable = [
        'resource_id',
        'clinic_ids'
    ];
}
