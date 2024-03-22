<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceDataConditionTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('resource_condition', function (Blueprint $table) {
            $table->increments('resource_condition_id');
            $table->string("condition_name");
            $table->string("condition_redirect")->nullable();
            $table->enum("is_delete", ["0", "1"])->default("0");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('resource_condition');
    }

}
