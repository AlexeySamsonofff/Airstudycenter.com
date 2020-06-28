<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccommodationpricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accommodationprices', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('accommodation_id');
            $table->string('acc_type');
            $table->integer('typeid');
            $table->float('price')->nullable();
            $table->float('pricewith')->nullable();
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
        Schema::dropIfExists('accommodationprices');
    }
}
