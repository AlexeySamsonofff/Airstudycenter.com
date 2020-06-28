<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DropColumnFromAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {

            $table->dropColumn('description');
            $table->dropColumn('description_tr');
            $table->dropColumn('description_ar');
            $table->dropColumn('description_ru');
            $table->dropColumn('description_de');
            $table->dropColumn('description_it');
            $table->dropColumn('description_fr');
            $table->dropColumn('description_es');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            //
        });
    }
}
