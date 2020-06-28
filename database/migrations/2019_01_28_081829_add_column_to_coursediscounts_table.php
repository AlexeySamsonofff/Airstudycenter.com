<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToCoursediscountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('coursediscounts', function (Blueprint $table) {
            //
            $table->float('discount')->nullable()->change();
            $table->float('deal')->after('discount')->nullable();
            $table->float('commission')->after('discount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('coursediscounts', function (Blueprint $table) {
            //
        });
    }
}
