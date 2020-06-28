<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMultilangColumnToAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {

            $table->char('name_se')->nullable()->after('name_fr');
            $table->char('name_jp')->nullable()->after('name_se');
            $table->char('name_fa')->nullable()->after('name_jp');
            $table->char('name_pr')->nullable()->after('name_fa');
           
          
            $table->longText('description')->nullable()->after('name_pr');
            $table->longText('description_tr')->nullable()->after('description');
            $table->longText('description_ar')->nullable()->after('description_tr');
            $table->longText('description_ru')->nullable()->after('description_ar');
            $table->longText('description_de')->nullable()->after('description_ru');
            $table->longText('description_it')->nullable()->after('description_de');
            $table->longText('description_fr')->nullable()->after('description_it');
            $table->longText('description_se')->nullable()->after('description_fr');
             $table->longText('description_es')->nullable()->after('description_se');
            $table->longText('description_jp')->nullable()->after('description_es');
            $table->longText('description_fa')->nullable()->after('description_jp');
            $table->longText('description_pr')->nullable()->after('description_fa');

            $table->char('owner_name_se')->nullable()->after('owner_name_fr');
            $table->char('owner_name_jp')->nullable()->after('owner_name_se');
            $table->char('owner_name_fa')->nullable()->after('owner_name_jp');
            $table->char('owner_name_pr')->nullable()->after('owner_name_fa');
            
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
