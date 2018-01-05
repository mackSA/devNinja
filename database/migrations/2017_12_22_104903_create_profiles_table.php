<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->string('contact')->nullable();
            $table->string('position')->nullable();
            $table->string('location')->nullable();
            $table->string('company')->nullable();
            $table->string('git_link')->nullable();
            $table->string('salary')->nullable();
            $table->string('linkedin_link')->nullable();
            $table->text('bio')->nullable();
            $table->string('avatar')->default('public/avatars/default.jpg');
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
