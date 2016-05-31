<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('surname');
            $table->string('username');
            // $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password', 60);
            $table->text('description');
            $table->string('facebook_id')->unique();
            $table->string('avatar');
            $table->string('country_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('role')->default('user');
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_google')->nullable();
            $table->string('social_website')->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
