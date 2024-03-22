<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResourceConditionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_resource_condition_data', function (Blueprint $table) {
            $table->increments('user_condition_id');
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("resource_id");
            $table->unsignedInteger("condition_id");
            $table->enum("is_delete", ["0", "1"])->default("0");
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');
            $table->foreign('condition_id')->references('resource_condition_id')->on('resource_condition');
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
        Schema::dropIfExists('user_resource_condition_data');
    }
}
