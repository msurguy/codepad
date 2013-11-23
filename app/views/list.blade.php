@extends('layout')

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Showing all posts</h1>
      </div>
    </div>
    
    @foreach($posts as $post)
      @if($post->content && $post->content != 'null')
      <hr>
      <div class="row">
        <div class="col-md-12">
          <a href="{{ url('posts/'.$post->id.'/edit') }}">Edit</a>
          @foreach(json_decode($post->content)->data as $content)
            {{ Post::presentContent($content) }}
          @endforeach
        </div>
      </div>
      @endif
    @endforeach
  </div>
@stop

@section('scripts')
  <script src="{{ url('trevr/components/jquery/jquery.js')}}"></script>
  <script src="{{url('css/FitVids.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(".container").fitVids();
  });
  </script>
@stop
