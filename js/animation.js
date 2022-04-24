$(window).scroll(function() {
   var hT1 = $('#first').offset().top,
       hT2 = $('#second').offset().top,
       hT3 = $('#aboutUS').offset().top,
       wH = $(window).height(),
       wS = $(this).scrollTop();
    var offset1 = wS-hT1;
    var offset2 = wS-hT2;
    var offset3 = wS-hT3;
    if (offset1 >= 0 && offset1 < wH){
       $('#first').addClass('animated tada');
       $('#second').removeClass('animated zoomIn');
       $('#aboutUS').removeClass('animated slideInLeft');
    }
    if (offset2 >= 0 && offset2 < wH){
       $('#first').removeClass('animated tada');
       $('#second').addClass('animated zoomIn');
       $('#aboutUS').removeClass('animated slideInLeft');
    }
    if (offset3 >= 0 && offset3 < wH){
       $('#first').removeClass('animated tada');
       $('#second').removeClass('animated zoomIn');
       $('#aboutUS').addClass('animated slideInLeft');
    }
});
