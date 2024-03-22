<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResourceCategoryTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('resource_category', function (Blueprint $table) {
            $table->increments('resource_cat_id');
            $table->string('name');
            $table->string('main_cat_id')->default("0");
            $table->enum('is_delete', ['0', '1'])->default("0");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('resource_category');
    }

}
