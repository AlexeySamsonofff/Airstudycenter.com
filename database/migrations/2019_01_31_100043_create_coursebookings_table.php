<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursebookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursebookings', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('school_id');
            $table->integer('course_id');
            $table->date('course_date')->nullable();
            $table->integer('accommodation_id')->nullable();
            $table->integer('transport_id')->nullable();
            $table->string('all_price');
            $table->string('registration_fee');
            $table->string('hours_per_week');
            $table->string('accommodation_price')->nullable();
            $table->string('total_course_price');
            $table->string('transport_price')->nullable();
            $table->string('receipt_url');
            $table->string('payment_status');
            $table->integer('card_lastdigit');
            $table->string('card_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursebookings');
    }
}
