
jQuery(document).ready(function(){
    jQuery(window).on('scroll load', function(){
        var scroll = jQuery(this).scrollTop();
        if(scroll > 4){
            jQuery('.main-header').addClass('fixed_header');
        }
        else{
            jQuery('.main-header').removeClass('fixed_header');
        }
    });
    jQuery('ul.communities-tab > li > a').on('click', function(e){
        e.preventDefault();
        jQuery(this).parent().siblings().find('a').removeClass('active');
        jQuery(this).addClass('active');
        jQuery(".communities-grid-row").hide().removeClass('open');
        let attr = jQuery(this).attr('data-value');
        jQuery(".communities-grid-row[data-target=" + attr + "]").fadeIn(500).removeClass('open');
    });
    
});

let mobileIpad = function(){
    if(jQuery(window).width() <= 1023){
        jQuery('.toogle-btn').on('click', function(e){
            e.preventDefault();
            jQuery('html').toggleClass('no_scroll');
            jQuery(this).toggleClass('on');
            jQuery('.navigation').toggleClass('open');
        });

        jQuery("ul.main_menu > li.menu-item-has-children > a").on("click", function(event){
          event.preventDefault();
          jQuery('ul.main_menu > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
          jQuery(this).toggleClass("active");
          jQuery(this).parent().siblings().find('ul.sub-menu').slideUp();
          jQuery(this).siblings('ul.main_menu > li > ul.sub-menu').slideToggle();
          jQuery(this).parent().siblings().toggleClass('sib');
        });
        jQuery("ul.main_menu ul > li.menu-item-has-children > a").on("click", function(event){
          event.preventDefault();
          jQuery('ul.main_menu ul > li.menu-item-has-children > a').not(jQuery(this)).removeClass('active');
          jQuery(this).toggleClass("active");
          jQuery(this).parent().siblings().find('ul.sub-menu').slideUp();
          jQuery(this).siblings('ul.main_menu ul > li > ul.sub-menu').slideToggle();
        });

    }
}
jQuery(document).on('ready', function () { mobileIpad(); });

jQuery(document).on('ready', function(){
    let communitiesEle = jQuery('.communities-img').length;
    let currentIndex = 0;
    function activeAnim(){
        let counter = currentIndex % communitiesEle;
        jQuery(".communities-img").removeClass('active');
        jQuery(".communities-img[data-value="+ counter +"]").addClass('active');
        ++currentIndex;
    }
    setInterval(activeAnim, 5000);

    let graphEle = jQuery('.graph-img').length + 1;
    let graphIndex = 0;
    function graphAnim(){
        let counterGraph = graphIndex % graphEle;
        jQuery(".graph-img").removeClass('active');
        jQuery(".graph-img[data-value="+ counterGraph +"]").addClass('active');
        ++graphIndex;
    }
    setInterval(graphAnim, 4000);
});
