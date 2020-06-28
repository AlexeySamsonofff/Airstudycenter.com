<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeDatatypesToSchooladdressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schooladdresses', function (Blueprint $table) {
            $table->string('countryId')->change();
            $table->string('stateId')->change();
            $table->string('cityId')->change();
            $table->string('zipCodeId')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schooladdresses', function (Blueprint $table) {
            //
        });
    }
}
