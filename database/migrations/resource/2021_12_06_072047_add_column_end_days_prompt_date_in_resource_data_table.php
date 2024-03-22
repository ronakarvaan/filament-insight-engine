<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnEndDaysPromptDateInResourceDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('resource_data', function (Blueprint $table) {
            $table->enum("no_current_cycle",["Yes","No"])->default("No")->after('notification_content');
            $table->enum("no_previous_cycle",["Yes","No"])->default("No")->after('no_current_cycle');
            $table->string("prompt_date")->nullable()->after('no_previous_cycle');
            $table->string("end_days")->nullable()->after('prompt_date');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('resource_data', function (Blueprint $table) {
            //
        });
    }
}
