<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchooladdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schooladdresses', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('schoolId');
            $table->integer('countryId');
            $table->integer('stateId');
            $table->integer('cityId');
            $table->char('zipCodeId');
            $table->string('address');
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
        Schema::dropIfExists('schooladdresses');
    }
}
