<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultilangColumnToSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('schools', function (Blueprint $table) {
           $table->string('name_tr')->nullable()->after('name');
           $table->string('name_ar')->nullable()->after('name_tr');
           $table->string('name_ru')->nullable()->after('name_ar');
           $table->string('name_de')->nullable()->after('name_ru');
           $table->string('name_it')->nullable()->after('name_de');
           $table->string('name_fr')->nullable()->after('name_it');
           $table->string('name_es')->nullable()->after('name_fr');
           $table->string('name_se')->nullable()->after('name_es');
           $table->string('name_jp')->nullable()->after('name_se');
           $table->string('name_fa')->nullable()->after('name_jp');
           $table->string('name_pr')->nullable()->after('name_fa');
           $table->longText('description')->nullable()->after('name_pr');
           $table->longText('description_ar')->nullable()->after('description');
           $table->longText('description_ru')->nullable()->after('description_ar');
           $table->longText('description_de')->nullable()->after('description_ru');
           $table->longText('description_it')->nullable()->after('description_de');
           $table->longText('description_fr')->nullable()->after('description_it');
           $table->longText('description_tr')->nullable()->after('description_fr');
           $table->longText('description_se')->nullable()->after('description_tr');
           $table->longText('description_es')->nullable()->after('description_se');
           $table->longText('description_fa')->nullable()->after('description_es');
           $table->longText('description_jp')->nullable()->after('description_fa');
           $table->longText('description_pr')->nullable()->after('description_jp');
         
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
