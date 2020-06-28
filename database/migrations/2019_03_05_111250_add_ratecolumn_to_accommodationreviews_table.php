<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRatecolumnToAccommodationreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodationreviews', function (Blueprint $table) {
            //
            $table->integer('rate1')->after('rate');
            $table->integer('rate2')->after('rate');
            $table->integer('rate3')->after('rate');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accommodationreviews', function (Blueprint $table) {
            //
        });
    }
}
