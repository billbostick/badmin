<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
<style>
.nav>li>a {
    padding: 5px 10px;
}
ul.nav-pills {
    padding-top: 25px;
}
</style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <div class="container-fluid">
    <div class="row">
      <div class="col-xs-12">
        @include('badmin::partials.header-partial')
        @if ($errors->has())
          @foreach ($errors->all() as $error)
            <div class='bg-danger alert'>
              {{ $error }}
            </div>
          @endforeach
        @endif
        @yield('content')
        @yield('footer')
      </div>
    </div>
  </div>
</body>
</html>

