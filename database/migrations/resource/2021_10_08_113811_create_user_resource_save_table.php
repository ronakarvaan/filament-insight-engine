<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserResourceSaveTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_resource_save', function (Blueprint $table) {
            $table->increments('save_id');
            $table->unsignedInteger("user_id");
            $table->unsignedInteger("resource_id");
            $table->enum("is_delete", ["0", "1"])->default("0");
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');
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
        Schema::dropIfExists('user_resource_save');
    }
}
