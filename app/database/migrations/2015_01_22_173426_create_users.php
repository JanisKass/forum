<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsers extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
            Schema::create('users', function($table) {
                // default required columns
                $table->increments('id'); 
                $table->timestamps();
                // required column for Auth layer (in User only model)
                $table->rememberToken();
                // specific columns
                $table->string('email');
                $table->string('password', 60);
                $table->string('username', 100);
                $table->string('picture', 250)->nullable();
                $table->boolean('notification')->default(true);
                $table->tinyInteger('class')->default(1);
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
