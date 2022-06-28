<?php 
  use App\NavPage;

  $pages = NavPage::orderBy('order', 'asc')->get();
?>
<div class="nav nav-light">
<a href="{{ route('index') }}">{{ Config::get('app.name') }}</a>
<button class="material-icons mobile-menu-open" onclick="toggleMobileNav()">menu</button>
  <ul class="nav-links">
    @foreach($pages as $page)
      <li><a class="{{ ((Request::is($page->route) || Request::is($page->route . '/*')) && $page->route) ? 'active' : ''}} {{ (!$page->route && !$page->href) ? 'hide' : '' }}" {{ $page->isExternalPage() }} href="{{ $page->route ? route($page->route) : $page->href }}">{{ $page->name }}</a></li>
    @endforeach
  </ul>
</div>
<div class="nav-background nav-background-fade-out" onclick="toggleMobileNav()"></div>