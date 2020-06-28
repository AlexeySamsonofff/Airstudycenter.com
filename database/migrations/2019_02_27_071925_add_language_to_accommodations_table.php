<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddLanguageToAccommodationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accommodations', function (Blueprint $table) {
            //
            $table->char('name_tr')->nullable()->after('name');
            $table->char('name_ar')->nullable()->after('name');
            $table->char('name_ru')->nullable()->after('name');
            $table->char('name_de')->nullable()->after('name');
            $table->char('name_it')->nullable()->after('name');
            $table->char('name_fr')->nullable()->after('name');
            $table->text('description_tr')->nullable()->after('description');
            $table->text('description_ar')->nullable()->after('description');
            $table->text('description_ru')->nullable()->after('description');
            $table->text('description_de')->nullable()->after('description');
            $table->text('description_it')->nullable()->after('description');
            $table->text('description_fr')->nullable()->after('description');
            $table->char('owner_name_tr')->nullable()->after('owner_name');
            $table->char('owner_name_ar')->nullable()->after('owner_name');
            $table->char('owner_name_ru')->nullable()->after('owner_name');
            $table->char('owner_name_de')->nullable()->after('owner_name');
            $table->char('owner_name_it')->nullable()->after('owner_name');
            $table->char('owner_name_fr')->nullable()->after('owner_name');
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
