<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHuyensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('huyens', function (Blueprint $table) {
            $table->id();
            $table->string('huyen_name')->nullable();
            $table->longText('huyen_description')->nullable();
            $table->timestamps();

            $table->unsignedBigInteger('tinh_id')->nullable();
            $table->foreign('tinh_id')->references('id')->on('tinhs')->onDelete('cascade');

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
        Schema::dropIfExists('huyệns');
    }
}
