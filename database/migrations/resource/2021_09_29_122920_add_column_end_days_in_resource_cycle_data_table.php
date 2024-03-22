<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEndDaysInResourceCycleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_cycle_data', function (Blueprint $table) {
            $table->string("cycle_end_days")->nullable()->after("cycle_day");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_cycle_data', function (Blueprint $table) {
            //
        });
    }
}
