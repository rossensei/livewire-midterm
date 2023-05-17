<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('eventname');
            $table->string('evt_details');
            $table->string('location');
            $table->date('evt_date');
            $table->time('time_start');
            $table->time('time_end');
            $table->string('status')->default('Pending');
            $table->unsignedBigInteger('band_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('band_id')->references('id')->on('bands')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
};
