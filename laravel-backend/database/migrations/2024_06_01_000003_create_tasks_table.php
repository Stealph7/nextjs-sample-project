<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->unsignedBigInteger('parcel_id')->nullable();
            $table->dateTime('due_date')->nullable();
            $table->string('priority')->default('normal'); // e.g., urgent, important, normal
            $table->string('status')->default('pending'); // e.g., pending, completed
            $table->timestamps();

            $table->foreign('parcel_id')->references('id')->on('parcels')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::dropIfExists('tasks');
    }
}
