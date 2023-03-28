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
                    variableWidth: true,
                }
            },
            {
            breakpoint: 768,
                settings: {
                    centerPadding: '30px',  
                    variableWidth: true,
                }
            }
        ]
    });
    const $defaultDots = $(".full-width-slider ul.slick-dots");
    if (typeof $defaultDots !== "undefined" && $defaultDots.length > 0){
        $('div.slick-next').insertBefore('.slick-dots-container');
        $defaultDots.wrap("<div class='default-dots-center aligncenter'><div class='default-dots-container'></div></div>");
        $('.default-dots-container ul.slick-dots').before($('div.slick-arrow'));
    }

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
                    variableWidth: true,
                    arrows: false,
                }
            },
            {
            breakpoint: 768,
                settings: {
                    centerPadding: '30px',  
                    variableWidth: true,
                    arrows: false,
                }
            }
        ]
    });

    $('.home-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        centerMode: true,
        centerPadding: '200px',
        autoplay: true,
        autoplaySpeed: 3000,
        variableWidth: true,
        infinity: true,
        dots: true,
        arrows: true,
        prevArrow: '<div class="slick-arrow slick-prev"><span class="slick-btn fa-light fa-angle-left flex flex-center"></span></div>',
        nextArrow: '<div class="slick-arrow slick-next"><span class="slick-btn fa-light fa-angle-right flex flex-center"></span></div>',
        responsive: [
            {
            breakpoint: 1024,
                settings: {
                    centerPadding: '100px',        
                    variableWidth: true,
                    arrows: false,
                }
            },
            {
            breakpoint: 768,
                settings: {
                    centerPadding: '30px',  
                    variableWidth: true,
                    arrows: false,
                }
            }
        ]
    });

    if($(window).width() <= 1023){
        $('.featured-project-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true,
            arrows: false,
            dots: true,
            infinity: true,
            focusOnSelect: true,
        });

        $('.logo-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            variableWidth: true,
            centerMode: true,
            centerPadding: '200px',
            arrows: false,
            dots: true,
            infinity: true,
            focusOnSelect: true,
        });
    }

});

let mobileScn = function(){
    if($(window).width() <= 767){

    }
}
$(document).on('ready', function () { mobileScn(); });
