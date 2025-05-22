<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWeathersTable extends Migration
{
    public function up()
    {
        Schema::create('weathers', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->date('date')->nullable();
            $table->float('temperature')->nullable();
            $table->float('humidity')->nullable();
            $table->float('wind_speed')->nullable();
            $table->string('wind_direction')->nullable();
            $table->float('precipitation')->nullable();
            $table->time('sunrise')->nullable();
            $table->time('sunset')->nullable();
            $table->string('description')->nullable();
            $table->string('type')->nullable(); // current, forecast, trend
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('weathers');
    }
}
