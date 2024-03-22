<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedicationType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medication_type', function (Blueprint $table) {
            $table->increments('id');
            $table->string('medication_name');
            $table->string('add_by');
            $table->string('user_id')->nullable();
            $table->string('is_verify')->comment = '0=requested,1=verified';
            $table->string('is_delete')->comment = '0=not deleted,1=deleted';
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
        Schema::dropIfExists('medication_type');
    }
}
