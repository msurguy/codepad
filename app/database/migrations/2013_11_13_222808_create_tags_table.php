<?php

use Illuminate\Database\Migrations\Migration;

class CreateTagsTable extends Migration {

    public function up()
    {
        Schema::create('tags', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('tags');
    }

}
