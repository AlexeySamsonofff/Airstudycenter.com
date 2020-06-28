<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnToCoursepricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseprices', function (Blueprint $table) {
            $table->renameColumn('duration', 'hours_per_week');
            $table->renameColumn('price', 'ppw1');
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
           $table->renameColumn('hours_per_week','duration');
           $table->renameColumn('ppw1', 'price');
        });
       
    }
}
