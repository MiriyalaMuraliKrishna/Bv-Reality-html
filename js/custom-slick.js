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
            breakpoint: 1023,
                settings: {
                    centerPadding: '100px',
                    arrows: false,
                }
            },
            {
            breakpoint: 767,
                settings: {
                    centerPadding: '30px',
                    arrows:false,
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

    $('.home-slick-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        infinity: true,
        dots: true,
        arrows: true,
        prevArrow: '<div class="slick-arrow slick-prev"><span class="slick-btn fa-light fa-angle-left flex flex-center"></span></div>',
        nextArrow: '<div class="slick-arrow slick-next"><span class="slick-btn fa-light fa-angle-right flex flex-center"></span></div>',
        responsive: [
            {
            breakpoint: 1023,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1,
                    arrows: false,
                }
            },
            {
            breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
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
    }

    let count = $('.logo-slick-slider').children().length;
    if (count > 6) {
        $('.logo-slick-slider').slick({
            slidesToShow: 6,
            slidesToScroll: 1,
            speed: 500,
            infinite: false,
            dots: true,
            arrows: false,
            responsive: [
                {
                    breakpoint: 1299,
                        settings: {
                            slidesToShow: 4,
                            slidesToScroll: 1,
                        }
                    },
                {
                breakpoint: 1023,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1,
                    }
                },
                {
                breakpoint: 767,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        variableWidth: true,
                        centerMode: true,
                        centerPadding: '200px',
                        arrows: false,
                        dots: true,
                        infinity: true,
                        focusOnSelect: true,
                    }
                }
            ],
        });
    }
});