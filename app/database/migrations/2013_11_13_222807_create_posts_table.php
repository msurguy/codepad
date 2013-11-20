<?php

use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {

    public function up()
    {
        Schema::create('posts', function($table)
        {
            $table->engine = 'InnoDB';

            $table->increments('id')->unsigned();
            $table->string('title', 140);
            $table->string('slug')->unique();
            $table->text('content');
            $table->integer('user_id')->unsigned();
            $table->timestamps();

           /* $table->foreign('user_id')
                  ->references('id')->on('users')
                  ->onUpdate('cascade')
                  ->onDelete('cascade');*/
        });
    }

    public function down()
    {
        /*Schema::table('posts', function($table)
        {
            $table->dropForeign('posts_user_id_foreign');
        });*/

        Schema::drop('posts');
    }

}
