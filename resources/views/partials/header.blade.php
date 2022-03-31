@include('partials.nav')
<div class="header-container" style="background: {{ isset($header_background) ? 'url('.$header_background ?? ''.')' : '#006480' }};">
  <div class="header-content">
     @yield('header_content')
  </div>
</div>