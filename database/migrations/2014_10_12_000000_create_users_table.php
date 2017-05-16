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
            $table->string('active')->default(0);
            $table->string('blocked')->default(0);
            $table->string('country_id')->nullable();
            $table->string('city_id')->nullable();
            $table->string('role')->default('user');
            $table->string('social_facebook')->nullable();
            $table->string('social_twitter')->nullable();
            $table->string('social_google')->nullable();
            $table->string('social_website')->nullable();
            $table->string('payment_paypal')->default(0);
            $table->string('payment_iban')->default(0);
            $table->string('payment_detail_paypal_email')->nullable();
            $table->string('payment_detail_iban_name')->nullable();
            $table->string('payment_detail_iban_surname')->nullable();
            $table->string('payment_detail_iban_number')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->datetime('last_login')->nullable();
            $table->string('ip')->nullable();
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
