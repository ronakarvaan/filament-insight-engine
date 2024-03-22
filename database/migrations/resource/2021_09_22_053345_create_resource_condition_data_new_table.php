<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResourceConditionDataNewTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_condition_data', function (Blueprint $table) {
            $table->increments('condition_data_id');
            $table->unsignedInteger("resource_id");
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');
            $table->string('condition')->nullable();
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
        Schema::dropIfExists('resource_condition_data');
    }
}
