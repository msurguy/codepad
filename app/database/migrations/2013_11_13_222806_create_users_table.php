<?php

use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration {

	public function up()
	{
	    Schema::create('users', function($table)
	    {
	    	$table->engine = 'InnoDB';

	        $table->increments('id')->unsigned();
	        $table->string('email')->unique();
	        $table->string('photo')->nullable()->default(NULL);
	        $table->string('name');
	        $table->string('username');
	        $table->string('password');
	        $table->integer('type')->default(0);
	        $table->timestamps();
	    });
	}

	public function down()
	{
	    Schema::drop('users');
	}

}
