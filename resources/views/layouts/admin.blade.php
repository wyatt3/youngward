<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }} - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/app.min.css">
    <script src="https://kit.fontawesome.com/73a07c3b04.js" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
  </head>
  <body>
  <div class="fixed-top">
    <div class="navbar navbar-dark navbar-expand-md bg-dark p-2">
        <a href="{{ route('admin.index') }}" class="navbar-brand">Young Ward Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#nav"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse justify-content-between" id="nav">
          <ul class="navbar-nav me-auto">
            <li class="nav-item">
              <a href="{{ route('index') }}" class="nav-link">Public Site</a>
            </li>
          </ul>
          <ul class="navbar-nav ms-auto">
            @if (Auth::user())
              <li class="nav-item"><a href="{{ route('announcements.admin.index') }}" class="nav-link {{ Request::is('admin/announcements*') ? 'active' : ''}}">Announcements</a></li>
              <li class="nav-item"><a href="{{ route('activities.admin.index') }}" class="nav-link {{ Request::is('admin/activities*') ? 'active' : '' }}">Activities</a></li>
              <li class="nav-item"><a href="{{ route('admin.index') }}" class="nav-link {{ Request::is('admin') ? 'active' : '' }}">Media</a></li>
              @if (Auth::user()->isAdmin())
                <li class="nav-item"><a href="{{ route('users.index') }}" class="nav-link {{ Request::is('admin/users*') ? 'active' : '' }}">Users</a></li>
              @else
                <li class="nav-item"><a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}" class="nav-link {{ Request::is('admin/users/edit*') ? 'active' : '' }}">Edit Account</a></li>
              @endif
              <li class="nav-item"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link text-danger">Logout</a></li>
              <form id="logout-form" action="{{ route('logout') }}" method="POST">@csrf</form>
            @endif
          </ul>
        </div>
      </div>
      @if(Session::has('message'))
        <div class="message alert alert-warning">{{ Session('message') }}</div>
      @endif
  </div>
  @yield('content')
  </body>
  <script>
    $(document).ready(function() {
      setTimeout(function() {
        $('.message').fadeOut(1200);
      }, 3000)
    });
    function deleteMedia(event, id) {
      event.target.innerHTML = "<i class='fa-solid fa-spin fa-circle-notch'></i>";
      $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
      $.ajax({
        type:"POST",
        url:"{{ route('media.delete') }}",
        data:{id:id},
        success:function() {
          event.target.parentElement.remove();
        }
      });
    }
  </script>
<html>