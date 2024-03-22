<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnMinMaxInResourceReportTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_report_type', function (Blueprint $table) {
                  $table->string("min_value")->nullable()->after("report_end_days");
                  $table->string("max_value")->nullable()->after("min_value");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_report_type', function (Blueprint $table) {
            //
        });
    }
}
