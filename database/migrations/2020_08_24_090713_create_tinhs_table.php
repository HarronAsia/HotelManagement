<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTinhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tinhs', function (Blueprint $table) {
            $table->id();
            $table->string('tinh_name')->nullable();
            $table->longText('tinh_description')->nullable();
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
        Schema::dropIfExists('tĩnhs');
    }
}
