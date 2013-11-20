<?php

use Illuminate\Database\Migrations\Migration;

class CreateTagPostTable extends Migration {

    public function up()
    {
        Schema::create('tag_post', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('tag_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();

            $table->foreign('tag_id')
                  ->references('id')->on('tags')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');

            $table->foreign('post_id')
                  ->references('id')->on('posts')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('tag_post', function($table)
        {
            $table->dropForeign('tag_post_tag_id_foreign');
            $table->dropForeign('tag_post_post_id_foreign');
        });

        Schema::drop('tag_post');
    }

}
