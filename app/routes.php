<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{	
	$posts = Post::orderBy('created_at','desc')->get();
	return View::make('list', ['posts'=>$posts]);
});

Route::get('posts/new', function()
{
	return View::make('editor');
});

Route::post('posts/new', function()
{
	$content = Input::get('data');
	$postID = Input::get('postID');

	if($postID == null)
	{
		$post = new Post;
		$post->slug = Str::random(8);
	} else {
		$post = Post::find($postID);
	}
	
	$post->content = json_encode($content);
	$post->save();

	return Response::json(array('postID'=>$post->id));
});

Route::get('posts/{id}', function($id)
{
	$post = Post::find($id);
	$post->date = $post->date;
	$decodedContent = json_decode($post->content)->data;

	return View::make('post',array('post'=>$post,'decodedContent'=>$decodedContent));
});