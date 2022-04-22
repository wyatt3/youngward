<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - Admin</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/app.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="navbar navbar-dark navbar-expand-md bg-dark">
      <a href="{{ route('admin.index') }}" class="navbar-brand">Young Ward Admin</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#nav"><span class="navbar-toggler-icon"></span></button>
      <div class="collapse navbar-collapse" id="nav">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a href="{{ route('index') }}" class="nav-link">Public Site</a>
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          @if (Auth::user())
            <li class="nav-item"><a href="{{ route('announcements.admin.index') }}" class="nav-link {{ Request::is('admin/announcements*') ? 'active' : ''}}">Announcements</a></li>
            <li class="nav-item"><a href="{{ route('activities.admin.index') }}" class="nav-link {{ Request::is('admin/activities*') ? 'active' : '' }}">Activities</a></li>
            <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin/media*') ? 'active' : '' }}">Media</a></li>
            @if (Auth::user()->isAdmin())
              <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">Users</a></li>
            @else
              <li class="nav-item"><a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}" class="nav-link {{ Request::is('admin/users/edit*') ? 'active' : '' }}">Edit User</a></li>
            @endif
            <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">Logout</a></li>
            <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
          @endif
        </ul>
      </div>
  </div>
  @yield('content')
  </body>
<html>