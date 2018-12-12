    jQuery(document).ready(function(){
        // wow js animation initialization
        new WOW().init();


        jQuery('.hero-slider').owlCarousel({
            loop: true,
            autoplay:1000,
            animateOut: 'fadeOut',
            animateIn: 'fadeIn',
            smartSpeed:500,
            margin: 0,
            dots:true,
            nav: false,
            responsive:{
                0:{
                    items: 1
                },
                600:{
                    items: 1
                },
                1000:{
                    items: 1
                }
            }
        });
    });

// change image on selection 
$(document).ready(function(){
    $(".network-tabs li").click(function(){
            $(this).addClass('active');
            $(".network-tabs li").removeClass('active');

    });
});