<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAccobookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accobookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userId');
            $table->integer('accommodationId');
            $table->string('accoType');
            $table->integer('typeId');
            $table->string('accFood');
            $table->integer('price');
            $table->string('receipt_url');
            $table->string('paymentStatus');
            $table->integer('card_lastdigit');
            $table->string('card_id');
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
        Schema::dropIfExists('accobookings');
    }
}
