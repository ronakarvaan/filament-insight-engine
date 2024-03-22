<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProtocolStageColumnInResourceCycleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_cycle_data', function (Blueprint $table) {
            $table->string("protocol_stage")->nullable()->after('before_cycle_end_days');
            
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
