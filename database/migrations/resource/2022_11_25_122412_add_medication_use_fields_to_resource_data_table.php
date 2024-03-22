<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_data', function (Blueprint $table) {
            
            $table->string("medication_use_stage")->nullable()->after("end_days");
            $table->string("medication_use_stage_day")->nullable()->after("medication_use_stage");
            $table->string("medication_use_name")->nullable()->after("medication_use_stage_day");
            $table->string("medication_use_end_days")->nullable()->after("medication_use_name");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_data', function (Blueprint $table) {
            //
        });
    }
};
