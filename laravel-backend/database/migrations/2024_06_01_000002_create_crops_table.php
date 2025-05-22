<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCropsTable extends Migration
{
    public function up()
    {
        Schema::create('crops', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('parcel_id');
            $table->string('growth_stage')->nullable();
            $table->integer('progress_percentage')->nullable();
            $table->date('harvest_date')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();

            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('crops');
    }
}
