<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultilangColumnToSchooltransportsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schooltransports', function (Blueprint $table) {

           $table->string('airport_name_tr')->nullable()->after('airport_name');
           $table->string('airport_name_ar')->nullable()->after('airport_name_tr');
           $table->string('airport_name_ru')->nullable()->after('airport_name_ar');
           $table->string('airport_name_de')->nullable()->after('airport_name_ru');
           $table->string('airport_name_it')->nullable()->after('airport_name_de');
           $table->string('airport_name_fr')->nullable()->after('airport_name_it');
           $table->string('airport_name_es')->nullable()->after('airport_name_fr');
           $table->string('airport_name_se')->nullable()->after('airport_name_es');
           $table->string('airport_name_jp')->nullable()->after('airport_name_se');
           $table->string('airport_name_fa')->nullable()->after('airport_name_jp');
           $table->string('airport_name_pr')->nullable()->after('airport_name_fa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schooltransports', function (Blueprint $table) {
            //
        });
    }
}
