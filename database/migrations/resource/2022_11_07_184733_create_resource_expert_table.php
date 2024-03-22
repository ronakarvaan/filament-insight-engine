<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceExpertTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_expert', function (Blueprint $table) {
            $table->increments('resource_expert_id');
            $table->string("resource_expert_title",255);
            $table->string('resource_expert_name',255);
            $table->string('resource_expert_position',255);
            $table->string('resource_expert_website',255)->nulable();
            $table->string('resource_expert_youtube',255)->nullable();
            $table->string('resource_expert_facebook',255)->nullable();
            $table->string('resource_expert_instagram',255)->nullable();
            $table->string('resource_expert_twitter',255)->nullable();
            $table->string('resource_expert_image',255)->nullable();
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
        Schema::table('resource_expert', function (Blueprint $table) {
            //
        });
    }
}
