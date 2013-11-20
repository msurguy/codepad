<!doctype html>
<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title></title>
  <meta name="description" content="Codepad blogging by @msurguy">
  <meta name="viewport" content="width=device-width">
  <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.1/css/bootstrap.min.css" rel="stylesheet">
  @yield('styles')
</head>
<body>
  <div class="container" style="margin-top:20px;">
    <div class="row">
      <div class="col-md-12 text-right">
        <a href="{{ url('/')}}" class="btn btn-default">View all posts</a>
        <a href="{{ url('posts/new')}}" class="btn btn-default">Create new</a>
      </div>
    </div>
  </div>

	@yield('content')
  @yield('scripts')
</body>
</html>
