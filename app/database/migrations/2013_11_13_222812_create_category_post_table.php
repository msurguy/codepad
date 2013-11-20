<?php

use Illuminate\Database\Migrations\Migration;

class CreateCategoryPostTable extends Migration {

    public function up()
    {
        Schema::create('category_post', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->integer('category_id')->unsigned();
            $table->integer('post_id')->unsigned();
            $table->timestamps();

            $table->foreign('category_id')
                  ->references('id')->on('categories')
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
        Schema::table('category_post', function($table)
        {
            $table->dropForeign('category_post_category_id_foreign');
            $table->dropForeign('category_post_post_id_foreign');
        });
        Schema::drop('category_post');
    }

}
