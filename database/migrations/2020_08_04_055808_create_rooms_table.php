<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
            $table->string('room_name');
            $table->string('room_image')->nullable();
            $table->string('room_floor');
            $table->string('room_number');
            $table->string('room_price');
            $table->string('room_type');
            $table->string('room_condition');
            $table->string('room_status');
            $table->longText('room_description');

            $table->integer('booking_time')->nullable();
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
          
            $table->unsignedBigInteger('hotel_id')->nullable();
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
