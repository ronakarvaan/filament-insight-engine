<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_data_file', function (Blueprint $table) {
            $table->increments('resource_file_id');
            $table->string('resource_file_type')->nullable();
            $table->string('resource_file',255)->nullable();
            $table->string('video_thumb')->nullable();
            $table->string('video_min')->nullable();
            $table->string('video_hour')->nullable();
            $table->string('video_sec')->nullable();
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
        Schema::dropIfExists('resource_data_file');
    }
}
