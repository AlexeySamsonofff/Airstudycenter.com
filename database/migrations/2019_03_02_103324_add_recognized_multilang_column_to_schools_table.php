<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRecognizedMultilangColumnToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
            
             $table->string('recognised_by_tr')->nullable()->after('recognised_by');
             $table->string('recognised_by_ar')->nullable()->after('recognised_by_tr');
             $table->string('recognised_by_de')->nullable()->after('recognised_by_ar');
             $table->string('recognised_by_fr')->nullable()->after('recognised_by_de');
             $table->string('recognised_by_jp')->nullable()->after('recognised_by_fr');
             $table->string('recognised_by_it')->nullable()->after('recognised_by_jp');
             $table->string('recognised_by_es')->nullable()->after('recognised_by_it');
             $table->string('recognised_by_se')->nullable()->after('recognised_by_es');
             $table->string('recognised_by_pr')->nullable()->after('recognised_by_se');
             $table->string('recognised_by_fa')->nullable()->after('recognised_by_pr');
             $table->string('recognised_by_ru')->nullable()->after('recognised_by_fa');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('schools', function (Blueprint $table) {
            //
        });
    }
}
