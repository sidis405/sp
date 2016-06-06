<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVisitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id')->nullable();
            $table->string('origin')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('sharecode')->nullable();
            $table->double('payoff')->nullable();
            $table->string('ip')->nullable();
            $table->integer('payment_requested')->default(0);
            $table->integer('payment_made')->default(0);
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
        Schema::drop('visits');
    }
}
