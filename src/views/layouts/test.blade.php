<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Title</title>
<link rel="stylesheet" href="css/bootswatch/flatly/bootstrap.css" media="screen">
<link rel="stylesheet" href="css/bootswatch/flatly/custom.min.css">
<script src="css/bootswatch/flatly/html5shiv.js"></script>
<script src="css/bootswatch/flatly/respond.min.js"></script>

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
<div class='col-lg-4 col-lg-offset-4'>
  <div class="container-fluid">
    @if ($errors->has())
      @foreach ($errors->all() as $error)
        <div class='bg-danger alert'>
          {{ $error }}
        </div>
      @endforeach
    @endif
    @yield('content')
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>

