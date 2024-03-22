<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MedicationProtocolStage extends Model
{
    protected $table = "medication_protocol_stage";
    protected $fillable = [
            'protocol_name','is_delete'
    ];
}
