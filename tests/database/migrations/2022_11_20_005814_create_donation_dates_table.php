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
        Schema::create('donation_dates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->unsignedbigInteger('campaign_id');
            $table->foreign('campaign_id')->references('id')->on('campaigns');

            $table->date('date_donation');
            $table->string("nombre_receptor"); //dejar o no?

            $table->unsignedBigInteger('medical_unit_id');
            $table->foreign('medical_unit_id')->references('id')->on('medical_units');

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
        Schema::dropIfExists('donation_dates');
    }
};
