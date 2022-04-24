(function ($) {
    "use strict";


    var $body = $("body"),
            $window = $(window);


    
    


    /*============================= Navigation Section ==============================*/



    $window.on('scroll', function () {
        "use strict";
        if ($(".navbar").offset().top > 50) {
            $(".navbar-default").addClass("small");
        } else {
            $(".navbar-default").removeClass("small");
        }
    });

    

    /*============================= Go top button ==============================*/

    $(window).on('scroll',function () {
        "use strict";
        if ($(this).scrollTop() > 50) {
            $('.scrolltop:hidden').stop(true, true).fadeIn();
        } else {
            $('.scrolltop').stop(true, true).fadeOut();
        }
    });
    $('.scroll').on('click', 'a', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 1
        }, 1000);
        event.preventDefault();
    });

    /*============================= fancybox ==============================*/

    $(window).on('load', function () {
        "use strict";
        $(".fancybox").fancybox();
    });

    /*============================= Smoothscroll js ==============================*/

    $('.navbar-default').on('click', 'a', function (event) {
        var $anchor = $(this);
        $('html, body').stop().animate({
            scrollTop: $($anchor.attr('href')).offset().top - 1
        }, 1000);
        event.preventDefault();
    });

    /*====================================== jquery scroll spy ========================================*/

    $body.scrollspy({
        target: ".navbar-collapse",
        offset: 15

    });
    
    
})(jQuery);

/*============================= Testimonial ==============================*/



    $(window).on('load', function () {
        "use strict";
        $("#testimonial-slider").owlCarousel({
        items:1,
        itemsDesktop:[1000,1],
        itemsDesktopSmall:[979,1],
        itemsTablet:[768,1],
        pagination:true,
        navigation:false,
        slideSpeed:1000,
        autoPlay:true
    });

    });
    
    /*===========================================counter-up===========================================*/

    $('.Count').each(function () {
        "use strict";
        $(this).prop('Counter', 0).animate({
            Counter: $(this).text()
        }, {
            duration: 15000,
            easing: 'swing',
            step: function (now) {
                $(this).text(Math.ceil(now));
            }
        });
    });

/*===========================================preload===========================================*/


    $(window).on('load', function () {
        "use strict";
        // Animate loader off screen
        $(".se-pre-con").fadeOut("slow");
        ;
    });



/*====================================== COLOR SCHEMES ========================================*/


$(".option").on("click", function () {
    $(".box").toggleClass("open");
});

$("body").on("click", function (o) {
    $(o.target).closest(".box").length || $(".box").removeClass("open");
});

$(".style1").on("click", function () {
    $("#color").attr("href", "css/color1/style1.css");
});

$(".style2").on("click", function () {
    $("#color").attr("href", "css/color1/style2.css");
});

$(".style3").on("click", function () {
    $("#color").attr("href", "css/color1/style3.css");
});

$(".style4").on("click", function () {
    $("#color").attr("href", "css/color1/style4.css");
});

$(".default").on("click", function () {
    $("#color").attr("href", "css/color1/default.css");
});
$(".style5").on("click", function () {
    $("#color").attr("href", "css/color1/style5.css");
});
