<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThreads extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
                 Schema::create('threads', function($table) {
                // default required columns
                $table->increments('id'); 
                $table->timestamps();
                // specific table columns
                $table->text('title');
                $table->text('comment');
                $table->string('picture', 250);
                // linking relationships
                $table->integer('category_id')->unsigned();
                $table->foreign('category_id')->references('id')->on('categories');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('categories');
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('threads');
	}

}
