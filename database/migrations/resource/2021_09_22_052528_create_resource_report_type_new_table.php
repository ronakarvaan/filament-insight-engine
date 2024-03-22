<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceReportTypeNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_report_type', function (Blueprint $table) {
            $table->increments('report_type_id');
            $table->unsignedInteger("resource_id");
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');
            $table->string("report_type");
            $table->string("report_category_main")->nullable();
            $table->string("report_sub_category")->nullable();
            $table->string("report_type_min_value")->nullable();
            $table->string("report_type_max_value")->nullable();
            $table->string("report_days")->nullable();
            $table->enum("is_delete", ["0", "1"])->default("0");  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_report_type');
    }
}
