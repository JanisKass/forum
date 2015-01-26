<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateComments extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('comments', function($table) {
                // default required columns
                $table->increments('id'); 
                $table->timestamps();
                // specific table columns
                $table->text('comment');
                // linking relationships
                $table->integer('thread_id')->unsigned();
                $table->foreign('thread_id')->references('id')->on('threads')->onDelete('cascade');
                $table->integer('user_id')->unsigned();
                $table->foreign('user_id')->references('id')->on('users');
            });	//
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('comments');
	}

}
