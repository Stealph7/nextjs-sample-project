<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlertsTable extends Migration
{
    public function up()
    {
        Schema::create('alerts', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // disease, pest, weather
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('status'); // urgent, important, information
            $table->dateTime('alert_date')->nullable();
            $table->unsignedBigInteger('parcel_id')->nullable();
            $table->timestamps();

            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('alerts');
    }
}
