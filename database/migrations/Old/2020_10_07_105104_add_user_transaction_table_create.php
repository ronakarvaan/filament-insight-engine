<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserTransactionTableCreate extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('user_transaction', function (Blueprint $table) {
            $table->increments('id');
            $table->string("user_id", 255);
            $table->string("transaction_id", 255);
            $table->enum("duraction", ["1", "3", "6", "try"]);
            $table->date("purchase_date");
            $table->date("start_date");
            $table->date("expire_date");
            $table->enum("status", ["Active", "InActive"]);
            $table->enum("is_delete", ["0", "1"])->defualt("0");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('user_transaction');
    }

}
