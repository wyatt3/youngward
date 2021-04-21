<!DOCTYPE html>
  <head>
    <title>{{ Config::get('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="css/app.min.css">
  </head>
  <body>
  @include('partials.header')
  @yield('content')
  @include('partials.footer')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="js/navbar.js"></script>
  </body>
<html>