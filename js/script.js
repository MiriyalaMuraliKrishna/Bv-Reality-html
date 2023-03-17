var $ = jQuery.noConflict();
$(document).ready(function(){

    $('.another-short-wrap').each(function(){ if( $(this).text().trim() === "" ) { noentry = true; $(this).addClass("no_content_jq"); } else { $(this).removeClass("no_content_jq"); } });

    $(window).on('scroll load', function(){
        var scroll = $(this).scrollTop();
        if(scroll > 4){
            $('.main-header').addClass('fixed_header');
        }
        else{
            $('.main-header').removeClass('fixed_header');
        }
    });
    let reverseHeader = $('.home-page');
    if(reverseHeader !='undefined' && reverseHeader.length > 0){
        $('.main-header').addClass('sticky_header');
        $('.site-main-cover').addClass('no_space');
    }
    $('.header_secondary_btn').on('click', function(e){
        $(this).addClass('hide');
        $(this).parent().addClass('search_open');
        $('ul.main_menu').toggleClass('hide-menu');
        $('.header_srch').toggleClass('open');
    });
    $('.toggle_icon').on('click', function(e){
        e.preventDefault();
        $('.main-header').toggleClass('header_mobile');
        $(this).toggleClass('active');
        $('.navigation').toggleClass('open');
    });

    $('.accordion-header').on('click', function(e){
        e.preventDefault();
        $(this).parent().siblings().find('.accordion-header').removeClass('accordion-active');
        $(this).toggleClass("accordion-active");
        $(this).parent().siblings().find('.accordion-content').removeClass('open').slideUp(500);
        $(this).siblings('.accordion-content').addClass('open').slideToggle(500);
    });

    $('.filter_icon').on('click', function(e){
        e.preventDefault();
        $(this).toggleClass('open');
        $('.our-people-letter').fadeToggle(700);
        $('.our-people-dropdown').fadeToggle(700);
    });
    $('ul.common-banner-item li:first').addClass('active');
    $('ul.common-banner-item li > a').on('click', function(e){
        $(this).parent().siblings().removeClass('active');
        $(this).parent().addClass('active');
    });
    $("ul.alphabet-list li").click(function () {
        $("ul.alphabet-list li").removeClass("active");
        $(this).addClass("active");
    });
    $(".bio-people-text li a").click(function () {
        $(".bio-people-text li a").removeClass("active");
        $(this).addClass("active");
    });
});

let desktopScn = function(){
    if($(window).width() >= 1024){
        // desktop menu starts here
        $("ul.main_menu > li.expertise-nav-item > ul > li > ul > li.menu-item-has-children").hover(function(event){
            event.preventDefault();
            $(this).parent().parent().siblings('li').toggleClass('expertise-submenu');
        });
        $('.btn_show_more').on('click', function(e){
            e.preventDefault();
            $(this).parent().siblings('.bio-people-expand-content').addClass('expert-expanded');
            $(this).hide();
            $(this).siblings('.btn_show_less').show();
        });
        $('.btn_show_less').on('click', function(e){
            e.preventDefault();
            $(this).parent().siblings('.bio-people-expand-content').removeClass('expert-expanded');
            $(this).hide();
            $(this).siblings('.btn_show_more').show();
        });
    }
}
$(window).resize(function () { desktopScn(); });
$(document).on('ready', function () { desktopScn(); });

let mobileIpad = function(){
    if($(window).width() <= 1023){
        $("ul.main_menu > li.menu-item-has-children > a").on("click", function(event){
          event.preventDefault();
          $('ul.main_menu > li.menu-item-has-children > a').not($(this)).removeClass('active');
          $(this).toggleClass("active");
          $(this).parent().siblings().find('ul.sub-menu').slideUp();
          $(this).siblings('ul.main_menu > li > ul.sub-menu').slideToggle();
          $(this).parent().siblings().toggleClass('sib');
        });
        $("ul.main_menu ul > li.menu-item-has-children > a").on("click", function(event){
          event.preventDefault();
          $('ul.main_menu ul > li.menu-item-has-children > a').not($(this)).removeClass('active');
          $(this).toggleClass("active");
          $(this).parent().siblings().find('ul.sub-menu').slideUp();
          $(this).siblings('ul.main_menu ul > li > ul.sub-menu').slideToggle();
        });

    }
}
$(window).resize(function () { mobileIpad(); });
$(document).on('ready', function () { mobileIpad(); });

let mobileScreen = function(){
    if($(window).width() <= 767){
        $('.show_more').on('click', function(e){
            e.preventDefault();
            $(this).parent().closest('.expert-expand').addClass('expert-expanded');
            $(this).hide();
            $(this).siblings('.show_less').show();
        });
        $('.show_less').on('click', function(e){
            e.preventDefault();
            $(this).parent().closest('.expert-expand').removeClass('expert-expanded');
            $(this).hide();
            $(this).siblings('.show_more').show();
        });

        $('.banner-category-mobile').on('click', function(e){
            e.preventDefault();
            $(this).toggleClass('open');
            $('ul.banner-category').slideToggle(900);
        });
        $('ul.banner-category li a').on('click', function(e){
            e.preventDefault();
            let text = $(this).text();
            $('.banner-category-mobile span').text(text);
            $('ul.banner-category').slideUp();
        });
        $('.share-icon').on("click", function(e){
            e.preventDefault();
            $('.social-share-icons').toggleClass('open');
        });

        $('.bio-expertise-list h4').on('click', function(e){
            e.preventDefault();
            $(this).parent().siblings().find('h4').removeClass('active');
            $(this).toggleClass('active');
            $(this).parent().siblings().find('.bio-expertise-desc').slideUp(500);
            $(this).siblings('.bio-expertise-desc').slideToggle(500);
        });

        $('.bio-people-list h4').on('click', function(e){
            e.preventDefault();
            $(this).parent().siblings().find('h4').removeClass('active');
            $(this).toggleClass('active');
            $(this).parent().siblings().find('.bio-people-text').slideUp(500);
            $(this).siblings('.bio-people-text').slideToggle(500);
        });

        $('.common-dropdown').on('click', function(e){
            e.preventDefault();
            $(this).toggleClass('open');
            $('ul.banner-category').slideToggle(900);
        });
        $('ul.banner-category li a').on('click', function(e){
            e.preventDefault();
            let text = $(this).text();
            $('.banner-category-mobile span').text(text);
            $('ul.common-banner-item').slideUp();
        });

        $('.banner-dropdown').on('click', function(e){
            e.preventDefault();
            $(this).toggleClass('open');
            $('ul.common-banner-item').slideToggle(900);
        });
        $('ul.common-banner-item li > a').on('click', function(e){
            let text = $(this).text();
            $('.banner-dropdown span').text(text);
            $('ul.common-banner-item').slideUp();
        });
    }
}
$(window).resize(function () { mobileScreen(); });
$(document).on('ready', function () { mobileScreen(); });

$(document).ready(function(){
    if($(".bio-people-main").length > 0 ){
        $(window).on("scroll load", function(){
        let headHeight = $('.main-header').outerHeight(true);
        var height = $(".common-banner-section").outerHeight(true);
        let totHeight = headHeight + height;
        var scroll = $(this).scrollTop();
            if( scroll >= totHeight ){
                $(".bio-people-main").addClass("sticky_sidebar"); 
            }
            else{
                $(".bio-people-main").removeClass("sticky_sidebar");
            }
        });
    }
});