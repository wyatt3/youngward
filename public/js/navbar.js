var navIsOpen = false;
$(document).ready(() => {navBarBackground();});
$(window).scroll(() => {navBarBackground();});

function navBarBackground() {
    if($(window).scrollTop() <= 35) {
        $('.nav').addClass('nav-light');
        $('.nav').removeClass('nav-dark');
      } else {
          $('.nav').addClass('nav-dark');
          $('.nav').removeClass('nav-light');
      }
}
function toggleMobileNav() {
    navIsOpen = !navIsOpen;
    if (navIsOpen) {
        $('.nav-links').css('height', $('.nav-links').children().length * 37 + 'px');
        // $('.nav-background').css('height', '100%');
        $('.nav-background').addClass('nav-background-fade-in');
        $('.nav-background').removeClass('nav-background-fade-out');


    } else {
        $('.nav-links').css('height', '0px');
        // $('.nav-background').css('height', '0px');
        $('.nav-background').removeClass('nav-background-fade-in');
        $('.nav-background').addClass('nav-background-fade-out');
    }
}