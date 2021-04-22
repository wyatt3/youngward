<?php 
  use App\NavPage;

  $pages = NavPage::orderBy('order', 'asc')->get();
?>
<div class="nav nav-light">
<a href="{{ route('index') }}">{{ Config::get('app.name') }}</a>
<i class="material-icons mobile-menu-open">menu</i>
  <ul>
    @foreach($pages as $page)
      <li><a class="{{ Request::routeIs($page->route) ? 'active' : ''}}" href="">{{ $page->name }}</a></li>
    @endforeach
  </ul>
</div>