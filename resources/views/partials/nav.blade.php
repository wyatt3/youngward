<?php 
  use App\NavPage;

  $pages = NavPage::orderBy('order', 'asc')->get();
?>
<div class="nav nav-light">
<a href="{{ route('index') }}">{{ Config::get('app.name') }}</a>
<i class="material-icons mobile-menu-open" onclick="toggleMobileNav()">menu</i>
  <ul class="nav-links">
    @foreach($pages as $page)
      <li><a class="{{ Request::routeIs($page->route) ? 'active' : ''}}" {{ $page->isExternalPage() }} href="{{ $page->route ? route($page->route) : $page->href }}">{{ $page->name }}</a></li>
    @endforeach
  </ul>
</div>
<div class="nav-background nav-background-fade-out"></div>