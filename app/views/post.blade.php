@extends('layout')

@section('styles')
  <link rel="stylesheet" href="{{ URL::asset('css/highlight/github.css') }}">
@stop

@section('content')
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				@foreach($decodedContent as $content)
          {{ Post::presentContent($content) }}
        @endforeach
			</div>
		</div>
	</div>
@stop

@section('scripts')
  <script src="{{ url('js/vendor/highlight.pack.js')}}"></script>
  <script src="{{ url('trevr/components/jquery/jquery.js')}}"></script>
  <script src="{{url('css/FitVids.js')}}"></script>
  <script type="text/javascript">
  $(document).ready(function(){
    $(".container").fitVids();
    hljs.initHighlightingOnLoad();
  });
  </script>
@stop
