<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInEndDaysInResourceDataTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::table('resource_data', function (Blueprint $table) {
            $table->string("appointment_after_end_days")->nullable()->after("before_appointment_days");
            $table->string("appointment_before_end_days")->nullable()->after("appointment_after_end_days");
            $table->string("status_end_days")->nullable()->after("status_value");
            $table->string("rrf_end_days")->nullable()->after("rrf_option");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('resource_data', function (Blueprint $table) {
            //
        });
    }

}
