$(document).ready(navBarBackground());
$(window).scroll(function() { navBarBackground(); });

function navBarBackground() {
    if($(window).scrollTop() <= 35) {
        $('.nav').addClass('nav-light');
        $('.nav').removeClass('nav-dark');
      } else {
          $('.nav').addClass('nav-dark');
          $('.nav').removeClass('nav-light');
      }
}