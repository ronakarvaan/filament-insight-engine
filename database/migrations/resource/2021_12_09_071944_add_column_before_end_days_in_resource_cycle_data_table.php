<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnBeforeEndDaysInResourceCycleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_cycle_data', function (Blueprint $table) {
            $table->string("before_cycle_days")->nullable()->after('cycle_end_days');
            $table->string("before_cycle_end_days")->nullable()->after('before_cycle_days');
            
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
