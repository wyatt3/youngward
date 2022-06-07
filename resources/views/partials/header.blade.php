@include('partials.nav')
<div class="header-container" style="background: {{ isset($page->media) ? 'url(\'/storage/img/'. $page->media->path .'\')' : '#006480' }};">
  <div class="header-content">
     @yield('header_content')
  </div>
</div>