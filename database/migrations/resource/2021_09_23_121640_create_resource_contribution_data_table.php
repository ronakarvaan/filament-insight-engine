<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceContributionDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_contribution_data', function (Blueprint $table) {
            $table->increments('resource_contribution_id');
            $table->unsignedInteger('resource_id');
            $table->string('title')->nullable();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('website')->nullable();
            $table->string('contribution_image')->nullable();
            $table->enum("is_delete",["0","1"])->default("0");
            $table->foreign('resource_id')->references('resource_id')->on('resource_data');  
            $table->index(['resource_id']);
            $table->index(['title']);
            $table->index(['name']);
            $table->index(['position']);
            $table->index(['website']);
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
        Schema::dropIfExists('resource_contribution_data');
    }
}
