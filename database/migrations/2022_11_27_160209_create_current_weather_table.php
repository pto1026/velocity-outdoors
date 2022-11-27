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
        Schema::create('current_weather', function (Blueprint $table) {
            $table->id();
            $table->string('main');
            $table->string('description');
            $table->double('temp');
            $table->double('wind_speed');
            $table->integer('humidity');
            $table->foreignId('location_id');
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
        Schema::dropIfExists('current_weather');
    }
};
