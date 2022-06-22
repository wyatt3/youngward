<!DOCTYPE html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name') }} - @yield('title')</title>
    <link rel="stylesheet" href="{{config('app.url')}}/css/app.min.css">
    <link rel="shortcut icon" href="https://www.churchofjesuschrist.org/services/platform/v4/resources/static/image/favicon.ico" type="image/x-icon">
  </head>
  <body>
  @include('partials.header')
  @yield('content')
  @include('partials.footer')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <script src="{{config('app.url')}}/js/navbar.js"></script>
  </body>
<html>