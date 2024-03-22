<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationUnitType extends Model
{
    protected $table = "medication_unit_type";
    protected $fillable = [
            'unit_type_name','is_delete'
    ];
}
