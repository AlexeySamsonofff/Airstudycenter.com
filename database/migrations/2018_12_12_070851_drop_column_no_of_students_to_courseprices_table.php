<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnNoOfStudentsToCoursepricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseprices', function (Blueprint $table) {
             $table->dropColumn('no_of_lesson');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courseprices', function (Blueprint $table) {
             $table->dropColumn('no_of_lesson');
        });
    }
}
