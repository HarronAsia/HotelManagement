<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXãsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xãs', function (Blueprint $table) {
            $table->id();
            $table->string('xa_name')->nullable();
            $table->longText('xa_description')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('tĩnh_id')->nullable();
            $table->foreign('tĩnh_id')->references('id')->on('tĩnhs')->onDelete('cascade');

            $table->unsignedBigInteger('huyện_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('xãs', function (Blueprint $table) {
            $table->foreign('huyện_id')->references('id')->on('huyệns')->onDelete('cascade');
        });
    }
}
