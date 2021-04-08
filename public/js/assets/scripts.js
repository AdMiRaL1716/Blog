$(function() {
    "use strict";
    var wind = $(window);
    // scrollIt
    $.scrollIt({
      upKey: 38,                // key code to navigate to the next section
      downKey: 40,              // key code to navigate to the previous section
      easing: 'swing',          // the easing function for animation
      scrollTime: 600,          // how long (in ms) the animation takes
      activeClass: 'active',    // class given to the active nav element
      onPageChange: null,       // function(pageIndex) that is called when page is changed
      topOffset: -70            // offste (in px) for fixed top navigation
    });
    // navbar scrolling background
    wind.on("scroll",function () {
        var bodyScroll = wind.scrollTop(),
            navbar = $(".navbar"),
            logo = $(".navbar .logo> img");
        if(bodyScroll > 100){
            navbar.addClass("nav-scroll");
            logo.attr('src', 'img/logo-dark.png');
        }else{
            navbar.removeClass("nav-scroll");
            logo.attr('src', 'img/logo-light.png');
        }
    });
    // close navbar-collapse when a  clicked
    $(".navbar-nav .dropdown-item a").on('click', function () {
        $(".navbar-collapse").removeClass("show");
    });
    // Hover 3D
    $(".hover3d").hover3d({
        selector: ".hover3d-child",
        invert: true
    });
    // countUp
    $('.count').countUp({
        delay: 10,
        time: 1500
    });
});
// === window When Loading === //
$(window).on("load",function (){
    var wind = $(window);
    // Preloader
    $(".loading").fadeOut(500);
    // stellar
    wind.stellar();
    $('.filtering').on( 'click', 'span', function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
});
