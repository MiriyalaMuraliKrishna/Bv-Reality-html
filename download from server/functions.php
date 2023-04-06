<?php
if ( ! function_exists( 'bvreality_setup' ) ) {  

  function bvreality_setup() {
  load_theme_textdomain( 'bvreality', get_template_directory() . '/languages' );
  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );
  add_theme_support( 'title-tag' );
  add_theme_support(
      'post-formats',
      array(
        'link',
        'aside',
        'gallery',
        'image',
        'quote',
        'status',
        'video',
        'audio',
        'chat',
      )
    );
   add_theme_support( 'post-thumbnails' );
   set_post_thumbnail_size( 1568, 9999 );
	register_nav_menus(

      array(

        'primary' => esc_html__( 'Primary menu', 'bvreality' ),

        'footer'  => __( 'Secondary menu', 'bvreality' ),

      )

    );



    add_theme_support(

      'html5',

      array(

        'gallery',

        'caption',

        'style',

        'script',

        'navigation-widgets',

      )

    );    

  }

}

add_action( 'after_setup_theme', 'bvreality_setup' );

add_image_size( 'image-size-name', $width, $height, false );

add_filter( 'big_image_size_threshold', '__return_false' );

function bvreality_scripts() {
  $p_cache = rand();
  wp_enqueue_style( 'bvreality-style', get_template_directory_uri() . '/style.css', array(), ''.$p_cache.'' );
  wp_enqueue_style( 'bvreality-core-bundle', get_template_directory_uri() . '/core.bundle.css', array(), ''.$p_cache.'' );
  wp_enqueue_script( 'core-bundle-script', get_stylesheet_directory_uri() . '/dist/core.bundle.js', array('jquery'), ''.$p_cache.'', true );
  wp_enqueue_script( 'custom-slick-script', get_stylesheet_directory_uri() . '/js/custom-slick.js', array('jquery'), ''.$p_cache.'', true );

  if(is_category()){
      wp_enqueue_script( 'load-more-script', get_template_directory_uri() . '/js/load-more.js', array(), ''.$p_cache.'', true );
  }
  if(is_page_template('templates/contact.php')){
  wp_enqueue_style( 'selectBoxjs', get_template_directory_uri() . '/css/selectBox.css', array(), ''.$p_cache.'' );
  wp_enqueue_script( 'selectBoxcss', get_stylesheet_directory_uri() . '/js/selectBox.js', array('jquery'), ''.$p_cache.'', true );
  }


  
}
add_action( 'wp_enqueue_scripts', 'bvreality_scripts' );

if( function_exists('acf_add_options_sub_page') )
{
   acf_add_options_sub_page(array(
       'title' => 'Header Options',
       'parent' => 'themes.php',
   ));

}



if(function_exists('acf_add_options_sub_page')) {

       acf_add_options_sub_page(array(

               'title' => 'Footer Options',

               'parent' => 'themes.php',

       ));

}




function cc_mime_types($mimes) {

  $mimes['svg'] = 'image/svg+xml';

  return $mimes;

}

add_filter('upload_mimes', 'cc_mime_types');


add_filter( 'big_image_size_threshold', '__return_false' );





function video_image_cta(){
   if ( have_rows('video_ctas') ) : ?>
    <section class="company-grid-section home-sec">
      <div class="container md">
        <div class="company-grid-wrap">
          <div class="company-grid-main flex">
          <?php $i=1; while ( have_rows('video_ctas') ) : the_row();
              if($i % 2 == 0){ 
				$reverse_class = "company-grid-list flex flex-vcenter"; }
				else{ $reverse_class = "company-grid-list flex flex-vcenter"; }
              $video_cta_heading       = get_sub_field('video_cta_heading');
              $video_cta_description   = get_sub_field('video_cta_description');
              $video_cta_button_text   = get_sub_field('video_cta_button_text');
              $video_cta_button_link   = get_sub_field('video_cta_button_link');
              $video_cta_image_video   = get_sub_field('video_cta_image_video');
              $video_cta_image         = get_sub_field('video_cta_image');
              $video_cta_poster_image  = get_sub_field('video_cta_poster_image');
    
              $poster_image  = ($video_cta_image_video =='video' ? $video_cta_poster_image :
                               ($video_cta_image_video =='image' ? $video_cta_image : ''
                       ));

			if(empty( $poster_image)){ $no_image_class= "no_repeater_image"; }else{ $no_image_class= ""; }
    
              $video_cta_video_type    = get_sub_field('video_cta_video_type');
              $video_cta_youtube_id    = get_sub_field('video_cta_youtube_id');
              $video_cta_vimeo_id      = get_sub_field('video_cta_vimeo_id');
    
              if(!empty($video_cta_youtube_id) && $video_cta_video_type == "youtube"){
                $video_cta_youtube_url   = 'http://www.youtube.com/watch?v='.$video_cta_youtube_id;
              }if(!empty($video_cta_vimeo_id) && $video_cta_video_type == "vimeo"){
                $video_cta_vimeo_url   = 'https://vimeo.com/'.$video_cta_vimeo_id;
              }
              
              $video_url   = ( $video_cta_video_type =='youtube' ? $video_cta_youtube_url :
                      ($video_cta_video_type =='vimeo' ? $video_cta_vimeo_url : ''
    
              ));
    
    
    
              if(!empty($video_cta_heading  ||  $video_cta_description )){?>
              <div class="<?php echo $reverse_class ." ".$no_image_class; ?>">
                <div class="company-grid-content">
                  <?php if(!empty($video_cta_heading )){?>
                    <h2><?php echo $video_cta_heading; ?></h2>
                  <?php } if(!empty($video_cta_description )){
                    echo $video_cta_description;
                  } if(!empty($video_cta_button_text &&  $video_cta_button_link)){?>
                  <a href="<?php echo $video_cta_button_link; ?>" class="button btn-black"><?php echo $video_cta_button_text; ?><span class="fa-solid fa-caret-right right-arrow"></span></a>
                  <?php } ?>
                </div>
                <?php  if(!empty($poster_image )){?>
					<div class="company-grid-image">
					<div class="company-grid-inner pos-relative">
						<figure class="object-fit company-grid-thumb">
						<img src="<?php echo $poster_image['url']; ?>" alt="<?php echo $poster_image['alt']; ?>">
						</figure>
						<?php if(!empty($video_url)){  ?>
						<div class="play-btn-main flex flex-center">
							<div class="play-btn pos-relative" data-animation="animation-smooth-out">
							<a class="play-btn-bg flex flex-center popup-youtube" href="<?php echo $video_url; ?>" target="_blank" rel="noopener">
							<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/play-icon.svg" alt="play-icon"></a>
							</div> 
						</div>
						<?php } ?>
					</div>
					</div>
                <?php } ?>
              </div>
          <?php } $i++; endwhile; ?>
          </div>
        </div>
      </div>
    </section>
    <?php endif; 
}


function shortcode_video( $atts = array() ) {
	$video_poster_image         = get_field('video_poster_image');
	$video_poster_image_mobile  = get_field('video_poster_image_mobile');
	$video_poster_image_mobile  = $video_poster_image_mobile ? $video_poster_image_mobile : $video_poster_image;
	$video_type                 = get_field('video_type');
	$video_id                   = get_field('video_id');
	$vimeo_video_id             = get_field('vimeo_video_id');

	if($video_type == 'vimeo'){
	  $default_page_video_popup = "https://player.vimeo.com/video/".$vimeo_video_id."";
	} else {
	  $default_page_video_popup = "http://www.youtube.com/watch?v=".$video_id."";
	}
  
		$video_short_code = '<div class="default-flex-image pos-relative">';
		if(!empty($video_poster_image)){
		$video_short_code .='<picture class="default-flex-thumb object-fit">
			<source srcset="'.$video_poster_image['url'].'" media="(min-width: 767px)"/>
			<img src="'.$video_poster_image_mobile['url'].'" alt="'.$video_poster_image_mobile['alt'].'">
		</picture>';
		}
		if(!empty($video_id )){
		$video_short_code .='<div class="play-btn-main flex flex-center">
			<div class="play-btn pos-relative" data-animation="animation-smooth-out">
				<a class="play-btn-bg flex flex-center popup-youtube" href="'.$default_page_video_popup.'" target="_blank" rel="noopener">
				<img src="'.get_stylesheet_directory_uri().'/images/play-icon.svg" alt="play-icon"></a>
			</div> 
		</div>';
		}
		$video_short_code .='<div class="default-flex-image-bg"></div>';
		$video_short_code .='</div>';
  
  
	  return $video_short_code;
  
  
  
  
  }
  
  add_shortcode('video', 'shortcode_video');


function community_slider(){
	
	$communities_heading = get_field('communities_heading');
	$select_project      = get_field('select_project');
	if ( empty( $select_project ) ) {
		$select_project = get_posts( array(
		  'post_type' => 'post',
		  'numberposts' => -1,
		  'post_status' => 'publish',
		  'orderby' => 'menu_order',
		  'order' => 'DESC',
	
		) );
	}	
?>
  <section class="more-communities-section">
	<div class="container">
		<div class="more-communities-wrap">
			<?php if ( !empty( $communities_heading ) ) { ?>
				<div class="more-communities-heading">
					<h4><?php echo $communities_heading; ?></h4>
				</div>
			<?php } ?>
			<div class="more-communities-main flex more-communities-slider">
			<?php  foreach ( $select_project as $post ): setup_postdata( $post );
        			$profile_image = get_field( 'profile_image', $post->ID );
					$thumbnail     = get_the_post_thumbnail_url( $post->ID );
					$alt_text      = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
  					if(empty($thumbnail)){ // banner
						$hero_banner_image   = get_field( 'hero_banner_image' );
					    $thumbnail           = $hero_banner_image['url'];
						$alt_text            = $hero_banner_image['alt'];
						
					}  if(empty($thumbnail)){//deault from category
						$hero_banner_image        = get_field( 'hero_banner_image', 'category_3' );
						 $thumbnail           =    $hero_banner_image['url'];
						$alt_text            =     $hero_banner_image['alt'];
						
					}
					
					$ideascategories1 = get_the_category($post->ID);
								if( $ideascategories1 ):
									$resultstr = array();
									foreach( $ideascategories1 as $breadcrumb_category ):
									$exclude_breadcrumb_arr = array(1,2,6);
									if(!in_array($breadcrumb_category->term_id,$exclude_breadcrumb_arr)){
										$breadcrumb_cat_title = $breadcrumb_category->name;
										$breadcrumb_catid = $breadcrumb_category->term_id;
										$resultstr[] = '<a href="' . esc_url( get_category_link( $breadcrumb_catid ) ) . '" class="">'.$breadcrumb_cat_title.'</a>';
									}
									endforeach;
									//echo implode(", ",$resultstr);
								endif;	
					?>
				<div class="more-communities-list">
						<figure class="more-communities-thumb object-fit">
							<a href="<?php echo get_the_permalink($post->ID); ?>"><img src="<?php echo $thumbnail; ?>" alt="<?php echo $alt_text; ?>"></a>
						</figure>
					<div class="more-communities-content flex">
						<div class="more-communities-category flex">
							<?php echo implode(" ",$resultstr); ?>
						</div>
						<h3><a href="<?php echo get_the_permalink($post->ID); ?>"><?php echo get_the_title($post->ID); ?></a></h3>
						<a href="<?php echo get_the_permalink($post->ID); ?>" class="button">More<span class="fa-solid fa-caret-right right-arrow"></span></a>
					</div>
				</div>
			<?php   endforeach; wp_reset_postdata(); ?>		
		</div>
	</div>
</section>
	
  <?php }

  function shortcode_full_width_image(){
    $full_width_image_desktop   = get_field( 'full_width_image_desktop');
    $full_width_image_mobile   = get_field( 'full_width_image_mobile');
    $full_width_image_mobile   = $full_width_image_mobile ? $full_width_image_mobile : $full_width_image_desktop;
    $full_width_image_caption   = get_field( 'full_width_image_caption');
    $full_width_image_description =   get_field( 'full_width_image_description');
    if(!empty($full_width_image_desktop)){
     $full_width_image ='<div class="big-image">
				<div class="container">
					<div class="fluid-container pos-relative">
						<div class="big-image-main pos-relative">
							<picture class="object-fit big-image-thumb">
								<source srcset="'.$full_width_image_desktop['url'].'" media="(min-width:767px)"/>
								<img src="'.$full_width_image_mobile['url'].'" alt="'.$full_width_image_mobile['alt'].'">
							</picture>';
							if(!empty($full_width_image_caption || $full_width_image_description)){
							$full_width_image .='<div class="big-image-caption pos-relative">
								<div class="caption-bg" data-animation="scale-x-in-left"></div>
								<h6>'.$full_width_image_caption.'</h6>
								<span>'. $full_width_image_description.'</span>
							</div>';
							}
						$full_width_image .='</div>
					</div>
				</div>
			</div>';
      return $full_width_image;
    }

  }
add_shortcode('full_width_image', 'shortcode_full_width_image');


function slider_fun(){

    $slider = '<section class="full-width-section">
	<div class="full-width-wrap">
		<div class="full-width-main full-width-slider">';
	while ( have_rows('slides') ) : the_row();
		$slides_image      = get_sub_field('slides_image');
		if(!empty($slides_image )){
		$slider .= '<div class="full-width-list">
				<picture class="object-fit full-width-thumb">
					<source srcset="'.$slides_image['url'].'" media="(min-width: 767px)"/>
					<img src="'.$slides_image['url'].'" alt="'.$slides_image['alt'].'">
				</picture>
			</div>';
	    } endwhile;	wp_reset_postdata();
		$slider .= '</div></div></section>';
return $slider;

}
add_shortcode('slider','slider_fun');

function split_image_fun(){
$split_images ="";
if ( have_rows('split_images') ) : 
$split_images .='<div class="two-grid-section">
				<div class="fluid-container pos-relative">
						<div class="container lg">
						<div class="two-grid-main flex">';
						while ( have_rows('split_images') ) : the_row();
						$image                    = get_sub_field('split_image');
						$split_image_caption      = get_sub_field('split_image_caption');
						$split_image_description  = get_sub_field('split_image_description');
						if(!empty($image )){
							$split_images .='<div class="two-grid-list pos-relative">
								<figure class="object-fit two-grid-thumb">
									<img src="'.$image['url'].'" alt="'.$image['alt'].'">
								</figure>';
								if(!empty($split_image_caption ||  $split_image_description)){
								$split_images .='<div class="two-grid-caption">
									<h6>'.$split_image_caption.'</h6>
									<span>'.$split_image_description.'</span>
								</div>';
								}
							$split_images .='</div>';
						} 
					    endwhile; wp_reset_postdata();
						$split_images .='</div></div></div></div>';
return $split_images;
endif;

}
add_shortcode('split_images', 'split_image_fun');

function add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
	$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
	}
add_filter( 'body_class', 'add_slug_body_class' );


function feature_projects_fun(){
$select_project = get_field('select_project');	
if (!empty( $select_project ) ) { 
	$projects ='<div class="default-grid-sec">
		<div class="fluid-container pos-relative">
			<div class="container">
				<div class="default-grid-wrap">
					<div class="default-grid-main flex">';
					  foreach ( $select_project as $post ): setup_postdata( $post );
						$profile_image = get_field( 'profile_image', $post->ID );
						$thumbnail     = get_the_post_thumbnail_url( $post->ID );
						$alt_text      = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
						if(empty($thumbnail)){ // banner
							$hero_banner_image   = get_field( 'hero_banner_image' );
							$thumbnail           = $hero_banner_image['url'];
							$alt_text            = $hero_banner_image['alt'];
							
						}  if(empty($thumbnail)){//deault from category
							$hero_banner_image        = get_field( 'hero_banner_image', 'category_3' );
							$thumbnail           =    $hero_banner_image['url'];
							$alt_text            =     $hero_banner_image['alt'];
							
						}
						
						$ideascategories1 = get_the_category($post->ID);
						if( $ideascategories1 ):
							$resultstr = array();
							foreach( $ideascategories1 as $breadcrumb_category ):
							$exclude_breadcrumb_arr = array(1,2,6);
							if(!in_array($breadcrumb_category->term_id,$exclude_breadcrumb_arr)){
								$breadcrumb_cat_title = $breadcrumb_category->name;
								$breadcrumb_catid = $breadcrumb_category->term_id;
								$resultstr[] = '<a href="' . esc_url( get_category_link( $breadcrumb_catid ) ) . '" class="">'.$breadcrumb_cat_title.'</a>';
							}
							endforeach;
						endif;
											
						$projects .='<div class="default-grid-list pos-relative">
							<div class="default-grid-thumb">
								<figure class="object-fit">
									<img src="'.$thumbnail.'" alt="'.$alt_text.'">
								</figure>
							</div>';
						$projects .='<div class="default-grid-content flex">
								<div class="default-grid-category flex">';
								$projects .= implode(", ",$resultstr);
						$projects .='</div>';
						$projects .='<h3><a href="'.get_the_permalink($post->ID).'">'.get_the_title($post->ID).'</a></h3>
								<a href="'.get_the_permalink($post->ID).'" class="button">More<span class="fa-solid fa-caret-right right-arrow"></span></a>
							</div>
						</div>';
						 endforeach; wp_reset_postdata();	
						$projects .='</div></div></div></div></div>';
						return $projects;
	 } 
}
add_shortcode('feature_projects', 'feature_projects_fun');




