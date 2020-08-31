<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xas', function (Blueprint $table) {
            $table->id();
            $table->string('xa_name')->nullable();
            $table->longText('xa_description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('huyen_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xas', function (Blueprint $table) {
            $table->foreign('huyen_id')->references('id')->on('huyens')->onDelete('cascade');
        });
    }
}
