<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAppointmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_appointment', function (Blueprint $table) {
             $table->increments('id');
            $table->string('user_id');
            $table->string('appointment_type');
            $table->date('date');
            $table->string('location');
            $table->string('from_time');
            $table->string('to_time');
            $table->text('note');
            $table->string('is_delete')->default("0");
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
        Schema::dropIfExists('user_appointment');
    }
}
