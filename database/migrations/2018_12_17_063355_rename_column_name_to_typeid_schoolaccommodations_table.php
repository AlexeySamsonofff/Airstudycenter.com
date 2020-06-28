<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RenameColumnNameToTypeidSchoolaccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schoolaccommodations', function (Blueprint $table) {
           $table->renameColumn('name', 'type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schoolaccommodations', function (Blueprint $table) {
              $table->renameColumn('type_id', 'name');
        });
    }
}
