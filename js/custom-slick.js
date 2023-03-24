var $ = jQuery.noConflict();
$(document).ready(function(){
  
    $('.full-width-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '200px',
        autoplay: true,
        autoplaySpeed: 3000,
        variableWidth: true,
        dots: true,
        arrows: true,
        prevArrow: '<div class="slick-arrow slick-prev"><span class="slick-btn fa-light fa-angle-left flex flex-center"></span></div>',
        nextArrow: '<div class="slick-arrow slick-next"><span class="slick-btn fa-light fa-angle-right flex flex-center"></span></div>',
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    centerPadding: '100px',        
                    variableWidth: false,
                }
            },
            {
            breakpoint: 767,
                settings: {
                    centerPadding: '30px',  
                    variableWidth: false,
                }
            }
        ]
    });

	$('.more-communities-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 3000,
        variableWidth: true,
        dots: true,
        arrows: true,
        prevArrow: '<div class="slick-arrow slick-prev"><span class="slick-btn fa-light fa-angle-left flex flex-center"></span></div>',
        nextArrow: '<div class="slick-arrow slick-next"><span class="slick-btn fa-light fa-angle-right flex flex-center"></span></div>',
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    centerPadding: '100px',        
                    variableWidth: false,
                }
            },
            {
            breakpoint: 767,
                settings: {
                    centerPadding: '30px',  
                    variableWidth: false,
                }
            }
        ]
    });

    // if($(window).width() <= 768){
    //     $('.logo-slider').slick({
    //         slidesToShow: 1,
    //         slidesToScroll: 1,
    //         arrows: false,
    //         dots: true,
    //         infinity: true,
    //         focusOnSelect: true,
    //     });
    // }

});