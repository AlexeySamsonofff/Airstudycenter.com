<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldsToCoursebookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coursebookings', function (Blueprint $table) {
            //
            $table->integer('ins_id')->nullable();
            $table->integer('visa_id')->nullable();
            $table->string('insprice')->nullable();
            $table->string('visaprice')->nullable();
            $table->string('school_Name')->nullable();
            $table->string('course_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coursebookings', function (Blueprint $table) {
            //
        });
    }
}
