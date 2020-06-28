<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNullableToCoursepricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseprices', function (Blueprint $table) {
            //
             $table->integer('hours_per_week')->nullable()->change();
             $table->float('ppw1')->nullable()->change();
             $table->float('ppw2')->nullable()->change();
             $table->float('ppw3')->nullable()->change();
             $table->float('ppw4')->nullable()->change();
             $table->float('ppw5')->nullable()->change();
             $table->float('ppw6')->nullable()->change();
             $table->float('ppw7')->nullable()->change();
             $table->float('ppw8')->nullable()->change();
             $table->float('ppw9')->nullable()->change();
             $table->float('ppw10')->nullable()->change();
             $table->float('ppw11')->nullable()->change();
             $table->float('ppw12')->nullable()->change();
             $table->float('ppw13')->nullable()->change();
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
            //
        });
    }
}
