<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultipleColumnToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
             
             $table->string('weblink')->nullable()->after('description');
             $table->string('phone')->after('description');
             $table->string('recognised_by')->nullable()->after('description');
             $table->integer('agelimit')->after('description');
             $table->mediumInteger('no_of_student')->after('description');
             $table->float('latitude')->nullable()->after('description');
             $table->float('longitude')->nullable()->after('description');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
}
