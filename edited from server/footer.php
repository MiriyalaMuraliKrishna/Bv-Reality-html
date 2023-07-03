<?php
//Default Customize CTA
$cta_image         = get_field('cta_image');
$cta_sub_heading  = get_field('cta_sub_heading'); 
$cta_heading      = get_field('cta_heading'); 
$cta_button_text  = get_field('cta_button_text'); 
$cta_button_link  = get_field('cta_button_link'); 

if(empty($cta_image && $cta_sub_heading && $cta_heading)){
	$cta_image        = get_field('cta_image','option');
	$cta_sub_heading  = get_field('cta_sub_heading','option'); 
	$cta_heading      = get_field('cta_heading','option'); 
	$cta_button_text  = get_field('cta_button_text','option'); 
	$cta_button_link  = get_field('cta_button_link','option');
	
}

if(is_single() && 'post' == get_post_type() || is_category()){

	if(is_single() && 'post' == get_post_type()){
		
		$cta_image        = get_field('cta_image');
		$cta_sub_heading  = get_field('cta_sub_heading'); 
		$cta_heading      = get_field('cta_heading'); 
		$cta_button_text  = get_field('cta_button_text'); 
		$cta_button_link  = get_field('cta_button_link');

	}if(empty($cta_image  && $cta_heading )){
	
		$catid = 'category_3';
		$cta_image        = get_field('cta_image',$catid);
		$cta_sub_heading  = get_field('cta_sub_heading',$catid); 
		$cta_heading      = get_field('cta_heading',$catid); 
		$cta_button_text  = get_field('cta_button_text',$catid); 
		$cta_button_link  = get_field('cta_button_link',$catid);
	}

	if(is_category()){
		$catid = 'category_3';
		$cta_image        = get_field('cta_image',$catid);
		$cta_sub_heading  = get_field('cta_sub_heading',$catid); 
		$cta_heading      = get_field('cta_heading',$catid); 
		$cta_button_text  = get_field('cta_button_text',$catid); 
		$cta_button_link  = get_field('cta_button_link',$catid);
	}

}

if(empty($cta_image )){ $no_cta_image_class = "no_cta_image"; }else{ $no_cta_image_class = "";  }?>
<section class="footer-custom-section pos-relative home-sec">

	<?php if(!empty($cta_sub_heading || $cta_heading )){ 
		if(!is_page(array(31,24))){ //404 page?>
	<div class="background-bg footer-overlay">
		<picture class="object-fit background-thumb">
			<source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/customizable-bg@2x.jpg" media="(min-width: 768px)">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/customizable-bg-mobile@2x.jpg" alt="customizable-bg-mobile">
		</picture>
	</div>
	<?php } if(!is_page(array(24,31,39))){ //404 page,contact, confirmation ?>
	<div class="custom-cta-section">
		<div class="container">
			<div class="custom-cta-main flex pos-relative">
				<?php if(!empty($cta_sub_heading || $cta_heading )){ ?>
					<div class="custom-cta-content <?php echo $no_cta_image_class; ?>">
						<?php if(!empty($cta_sub_heading)){?>
						<span class="sub-title"><?php echo $cta_sub_heading; ?></span>
						<?php } if(!empty($cta_heading)){?>
							<h2><?php echo $cta_heading; ?></h2>
						<?php } if(!empty($cta_button_text || $cta_button_link )){?>
							<a href="<?php echo $cta_button_link; ?>" class="button"><?php echo $cta_button_text; ?><span class="fa-solid fa-caret-right right-arrow"></span></a>
						<?php } ?>
					</div>
				<?php } if(!empty($cta_image )){ ?>
					<div class="custom-cta-img">
						<figure class="object-fit footer-thumb" data-animation="fade-in-right">
							<img src="<?php echo $cta_image['url']; ?>" alt="<?php echo $cta_image['alt']; ?>">
						</figure>
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
	<?php } 

	$footer_logo    = get_field('footer_logo', 'option');
	$copyright_text = get_field('copyright_text', 'option');
	$footer_menu    = get_field('footer_menu','option');
	?>
	<footer class="footer-main pos-relative">
		<div class="container">
			<div class="copyrights-main flex flex-vcenter">
				<?php  if(!empty($footer_logo)){ ?>
				<div class="copyrights-logo">
					<figure class="object-fit">
						<a href="<?php echo site_url(); ?>"><img src="<?php echo $footer_logo['url']; ?>" alt="<?php echo $footer_logo['alt']; ?>"></a>
					</figure>
				</div>
				<?php }  if(!empty($copyright_text)){?>
					<div class="copyrights-text">
						<p>© Copyright <?php echo date('Y')." ".$copyright_text; ?></p>
					</div>	
				<?php } ?>
				<div class="copyrights-nav">
					<?php if(!empty($footer_menu)){ 
							wp_nav_menu( array(
							'menu' => $footer_menu,
							'container' => false,
							'items_wrap' => '<ul class="copyrights-links flex">%3$s</ul>',

						) );
					} ?>
				</div>
			</div>
		</div>
	</footer>
</section>
<?php  }if(is_page('templates/confirmation.php') || is_404()){ ?>
	</section>
<?php } ?>
</div><!-- site-main-cover ends here -->
<script>
	jQuery(document).ready(function(){
		/*let homeCount = jQuery('.home-slick-slider').children().length;
		if (homeCount > 3) {
			jQuery('.home-slick-slider').slick({
				dots: true,
			});
		}*/
		setTimeout(() => {
			jQuery('.navigation').fadeIn();	
		}, 5000);
		
		jQuery('.home-slick-slider').slick({
        slidesToShow: 3,
        slidesToScroll: 2,
        infinity: true,
		speed: 4000,
       dots: true,
       arrows: true,
		variableWidth: true,
		prevArrow: '<div class="slick-arrow slick-prev"><span class="slick-btn fa-light fa-angle-left flex flex-center"></span></div>',
        nextArrow: '<div class="slick-arrow slick-next"><span class="slick-btn fa-light fa-angle-right flex flex-center"></span></div>',
         responsive: [
            {
            breakpoint: 1023,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
					
                }
            },
            {
            breakpoint: 767,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    arrows: false,
                    dots: true,
                }
            }
        ]
    });

		
	})
</script>
<?php 
wp_footer(); ?>
</body>
</html>