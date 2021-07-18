<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/app.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="navbar navbar-dark navbar-expand-md bg-dark">
      <a href="{{ route('admin.index') }}" class="navbar-brand">Young Ward Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav ml-auto">
          @if (Auth::user() ? Auth::user()->isAdmin() : '')
          <li class="nav-item"><a href="" class="nav-link">Media</a></li>
          <li class="nav-item"><a href="" class="nav-link">Manage Organizations</a></li>
          @endif

          @if (Auth::user())
            <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
          @endif
        </ul>
      </div>
  </div>
  @yield('content')
  </body>
<html>