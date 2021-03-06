<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('category_id');
            $table->string('title');
            $table->string('slug');
            $table->text('description');
            $table->longtext('body');
            $table->text('notes')->nullable();
            $table->text('admin_notes')->nullable();
            $table->integer('status_id')->default(1);
            $table->integer('rating')->default(0);
            $table->integer('featured_photo_id')->nullable();
            $table->integer('image_path')->nullable();
            $table->integer('view_counter')->default(0);
            $table->double('payoff_counter')->default(0);
            $table->integer('active')->default(1);
            $table->integer('ads')->default(1);
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
        Schema::drop('articles');
    }
}
