var $ = jQuery.noConflict();
$(document).ready(function(){
    $(window).on('scroll load', function(){
        var scroll = $(this).scrollTop();
        if(scroll > 4){
            $('.main-header').addClass('fixed_header');
        }
        else{
            $('.main-header').removeClass('fixed_header');
        }
    });
    $('ul.communities-tab > li > a').on('click', function(e){
        e.preventDefault();
        $(this).parent().siblings().find('a').removeClass('active');
        $(this).addClass('active');
        $(".communities-grid-row").hide().removeClass('open');
        let attr = $(this).attr('data-value');
        $(".communities-grid-row[data-target=" + attr + "]").fadeIn(500).removeClass('open');
    });
});
let desktopScn = function(){
    if($(window).width() >= 1024){
     
    }
}
$(document).on('ready', function () { desktopScn(); });

let mobileIpad = function(){
    if($(window).width() <= 1023){
        $('.toogle-btn').on('click', function(e){
            e.preventDefault();
            $('html').toggleClass('no_scroll');
            $(this).toggleClass('on');
            $('.navigation').toggleClass('open');
        });

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
$(document).on('ready', function () { mobileIpad(); });
