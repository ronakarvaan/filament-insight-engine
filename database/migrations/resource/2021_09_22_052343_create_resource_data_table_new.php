<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataTableNew extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_data', function (Blueprint $table) {
            $table->increments('resource_id');
            $table->string("topic_name");
            $table->longText("description")->nullable();
            $table->enum("resource_file_type", ["Image", "Video"])->default("Image");
            $table->unsignedInteger("resource_file_id");
            $table->string("resource_front_file")->nullable();
            $table->longText("hastag")->nullable();
            $table->string("medication_protocol_stage")->nullable();
            $table->string("medication_protocol_stage_day")->nullable();
            $table->string('appointment_type')->nullable();
            $table->string('after_appointment_days')->nullable();
            $table->string('before_appointment_days')->nullable();
            $table->string('resource_category')->nullable();
            $table->enum("subscription_type", ["free", "paid"]);
            $table->enum("insight_search", ["Yes", "No"])->default("Yes");
            $table->enum("is_show_europe",["Yes","No"])->default("No");
            $table->enum("insight_enagment", ["Yes", "No"])->default("No");
            $table->enum("expert_contribution", ["Yes", "No"])->default("No");
            $table->string('website_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('youtube_link')->nullable();
            $table->enum("is_delete", ["0", "1"])->default("0");  
            $table->foreign('resource_file_id')->references('resource_file_id')->on('resource_data_file');          
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
        Schema::dropIfExists('resource_data');
    }
}
