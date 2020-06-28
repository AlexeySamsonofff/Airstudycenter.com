<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraColumnToCoursepricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseprices', function (Blueprint $table) {
             $table->float('ppw2');
             $table->float('ppw3');
             $table->float('ppw4');
             $table->float('ppw5');
             $table->float('ppw6');
             $table->float('ppw7');
             $table->float('ppw8');
             $table->float('ppw9');
             $table->float('ppw10');
             $table->float('ppw11');
             $table->float('ppw12');
             $table->float('ppw13');
           
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
