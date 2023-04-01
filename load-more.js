var jqr5 = jQuery.noConflict();

jqr5(function() {
    if (jqr5("#ajax-load-more").length) {
	 //e = 1,
           var t = true,
            n = false,
            r = jqr5(window),
            i = jqr5("#ajax-load-more"),
            s = jqr5("#ajax-load-more ul"),
            o = s.attr("data-path");
            p = s.attr("data-pageNumber");
	    if(p!=''){
		aze = p;
	    } else {
		aze = 1;
	    }
        if (o === undefined) {
            o = "<?php bloginfo('stylesheet_directory'); ?>/ajax-load-more.php"
        }
        if (s.attr("data-button-text") === undefined) {
            jqr5button = "Older Posts"
        } else {
            jqr5button = s.attr("data-button-text")
        }
        i.append('<div id="load-more" class="more blog_more load-more"><span class="loader"></span><div class="divider flex flex-vcenter pos-relative"><span class="line half"></span><span class="line full"></span><span class="line half last"></span></div><span class="load-btn-wrap"><span class="button">' + jqr5button + "</span></span></div>");
        var u = function() {
            jqr5("#load-more").addClass("loading");
            jqr5("#load-more span.text").text("Loading...");
            jqr5.ajax({
                type: "GET",
                data: {
                    postType: s.attr("data-post-type"),
                    category: s.attr("data-category"),
                    author: s.attr("data-author"),
                    taxonomy: s.attr("data-taxonomy"),
                    tag: s.attr("data-tag"),
                    postNotIn: s.attr("data-post-not-in"),
                    numPosts: s.attr("data-display-posts"),
                    year: s.attr("data-year"),
                    month: s.attr("data-month"),
                    searchblog: s.attr("data-searchblog"),
                    offset: s.attr("data-offset"),
                    order: s.attr("data-order"),
                    option: s.attr("data-option"),
                    postsCount: s.attr("data-postsCount"),
                    pageNumber: aze,
                    pageOffset: aze,
                },
                url: o + "/ajax-load-more.php",
                beforeSend: function() {
                    if (aze != 1) {
                        jqr5("#load-more").addClass("loading");
                        jqr5("#load-more span.text").text("Loading...")
                    }
                },
                success: function(aze) {
                    jqr5data = jqr5(aze);
                    if (jqr5data.length == 0) {
                        jqr5("#load-more").removeClass("loading");
                        if (jqr5(window).width() >= 600) {
                            jqr5("#load-more span.text").text("That's all!")
                        } else {
                            jqr5("#load-more span.text").text("That's all!")
                        }
                        t = false;
                        n = true
                    } else if (jqr5data.length > 0) {
                    jQuery(document).on('click','.gated-form',function() {
                      var trID = jQuery(this).attr('rel');
                      jQuery("#field_qn4md").val(trID);
                      jQuery(".flyout-form").addClass("open");
                      jQuery(".flyout-bg").fadeIn();
					  jQuery('html').addClass('no_scroll');
                    })
                    jQuery(document).on('click','.flyout-close',function() {
                      jqr5(".flyout-form").removeClass("open");
                      jqr5(".flyout-bg").fadeOut();
					  jqr5('html').removeClass('no_scroll');
                    })
                    jQuery(document).on('click','.flyout-bg',function() {
                      jqr5(".flyout-close").trigger("click");
					  jqr5('html').removeClass('no_scroll');
                    })
                    jqr5(document).on('keydown', function(event) {
                      if (event.key == "Escape") {
                        jqr5(".flyout-close").trigger("click");
                      }
                    })
                        jqr5data = jqr5('<span id="more-blog" class="list_count">' + aze + "</span>");
                        jqr5data.hide();
                        s.append(jqr5data);
                        jqr5data.fadeIn(500, function() {
                            jqr5("#load-more").removeClass("loading");
                            jqr5("#load-more span.text").text(jqr5button);
                            t = false
                        })
                    }
                },
                error: function(aze, t, n) {
                    jqr5("#load-more").removeClass("loading");
                    jqr5("#load-more span.text").text(jqr5button)
                }
            })
        };
        var remain = 0;
        var count = 0;
        var postsCount= s.attr("data-postsCount");
        if(postsCount <=17){
       jQuery("#load-more").hide(); 
           if(postsCount == 0){ 
              jQuery("#ajax-load-more").append("<h3 class='no_result_found aligncenter'>Sorry, No posts found.</h3>")
           }
        }
        jqr5("#load-more").click(function() {
            if (!t && !n && !jqr5(this).hasClass("done")) {
                t = true;
                aze++;
                u()
            }
        count +=1; 
           
          var postsCount= s.attr("data-postsCount");
          
            remain = postsCount - 17 * count;
          //console.log(remain);
            if(remain <= 17){
               jQuery("#load-more").hide(); 

            }
        });
        u()
    }
})
