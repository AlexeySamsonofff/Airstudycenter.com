<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatSchooltransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooltransports', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('school_id');
            $table->string('airport_name');
            $table->float('pick_up');
            $table->float('pick_up_and_drop');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schooltransports');
    }
}
