<!DOCTYPE html>
  <head>
    <title>{{ Config::get('app.name') }} - @yield('title')</title>
  
  </head>
  <body>
  @include('layouts.nav')
  @yield('content')
  </body>
<html>