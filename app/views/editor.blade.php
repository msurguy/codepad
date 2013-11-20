@extends('layout')

@section('styles')
  <link rel="stylesheet" href="{{ url('trevr/sir-trevor-icons.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
  <link rel="stylesheet" href="{{ url('trevr/sir-trevor.css')}}" type="text/css" media="screen" title="no title" charset="utf-8">
  <style type="text/css">
  .st-block__inner label{
  	margin-bottom: 0;
  }

  a:hover {
  	text-decoration: none;
  }
  </style>
@stop

@section('content')
	<div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Creating a new Post <small>click on the "+" to add a new block</small></h1>
      </div>
    </div>
		<div class="row">
			<div class="col-md-12">
				<form id="form-content">
				  <div class="errors"></div>
				  <textarea class="sir-trevor" name="content"></textarea>
				</form>
			</div>
		</div>
		<div class="row" style="margin-top: 20px;">
			<div class="col-md-12">
				<a href="save" id="save-content" class="btn btn-lg btn-block btn-primary">Save post</a>
				<a href="" id="view-post" target="_blank" style="display: none;" class="btn btn-lg btn-block btn-success">View post</a>
			</div>
		</div>
		
	</div>
@stop  

@section('scripts')
  <script src="{{ url('trevr/components/jquery/jquery.js')}}"></script>
  <script src="{{ url('trevr/components/underscore/underscore.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ url('trevr/components/Eventable/eventable.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ url('trevr/sir-trevor.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ url('trevr/gist.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ url('trevr/ordered-list.js')}}" type="text/javascript" charset="utf-8"></script>
  <script src="{{ url('trevr/markdown.js')}}" type="text/javascript" charset="utf-8"></script>

  <script type="text/javascript" charset="utf-8">
    $(function(){
    	SirTrevor.DEBUG = true;
    	
      var postsRoot = "{{url('posts')}}",
          newPostURL = "{{url('posts/new')}}",
          postID = null,
    	    form = $('#form-content'),
          saveContentBtn = $('#save-content'),
          viewPostBtn = $('#view-post');

  		window.editor = new SirTrevor.Editor({
  			el: $('.sir-trevor'),
  			blockTypes: [
  				"Text",
  				"Heading",
  				"List",
  				"Quote",
  				//"Image",
  				"Video",
  				"Gist",
  				"OrderedList"
  			]
  		});

  		saveContentBtn.click(function(e)
  		{
  			e.preventDefault();
  			form.submit();
  			return false;
  		});

      form.bind('submit', function(){
        $.post( newPostURL, 
        	{ data: window.editor.dataStore, postID : postID}, 
        	function( data ) {
        		postID = data.postID;
  				if(postID){
  					viewPostBtn.fadeIn();
  					viewPostBtn.attr('href',postsRoot+'/'+postID);
  				}  
  		}, 
  		"json");
        return false;
      });

    });
  </script>
@stop
