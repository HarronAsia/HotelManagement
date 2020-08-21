<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();

            $table->string('avatar_image')->nullable();
            
            $table->string('username')->nullable();
            $table->string('number')->nullable();

            $table->string('personal_id')->nullable();
            $table->string('personal_id_date')->nullable();
            $table->string('personal_id_where')->nullable();

            $table->string('dob')->nullable();
            $table->string('gender')->nullable();
            $table->string('place')->nullable();
            $table->string('job')->nullable();
            $table->string('blood')->nullable();
            $table->string('relationship')->nullable();
            $table->integer('balance')->nullable();
            
            $table->longText('bio')->nullable();

            $table->string('google_plus_link')->nullable();
            $table->string('yahoo_link')->nullable();
            $table->string('skype_link')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('twitter_link')->nullable();
            $table->string('instagram_link')->nullable();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('profiles');
    }
}
