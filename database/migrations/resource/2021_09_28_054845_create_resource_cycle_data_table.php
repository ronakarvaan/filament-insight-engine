<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceCycleDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_cycle_data', function (Blueprint $table) {
            $table->increments('resource_cycle_id');
            $table->unsignedInteger('resource_id');
            $table->string('cycle_type')->nullable();
            $table->string('cycle_day')->nullable();
            $table->enum("is_delete",["0","1"])->default("0");
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');  
            $table->index(['resource_id']);
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
        Schema::dropIfExists('resource_cycle_data');
    }
}
