<?php
// Our include
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');
// Our variables
$postType   = (isset($_GET['postType'])) ? $_GET['postType'] : 'post';
$category   = (isset($_GET['category'])) ? $_GET['category'] : '';
$author_id  = (isset($_GET['author'])) ? $_GET['author'] : '';
$taxonomy   = (isset($_GET['taxonomy'])) ? $_GET['taxonomy'] : '';
$tag        = (isset($_GET['tag'])) ? $_GET['tag'] : '';
$exclude    = (isset($_GET['postNotIn'])) ? $_GET['postNotIn'] : '';
$include    = (isset($_GET['postIn'])) ? $_GET['postIn'] : '';
$pageOffset = (isset($_GET['pageNumber'])) ? $_GET['pageNumber'] : '';
$numPosts   = (isset($_GET['numPosts'])) ? $_GET['numPosts'] : 12;
$year       = (isset($_GET['year'])) ? $_GET['year'] : 0;
$month      = (isset($_GET['month'])) ? $_GET['month'] : 0;
$searchblog = (isset($_GET['searchblog'])) ? $_GET['searchblog'] : 0;
$order      = (isset($_GET['order'])) ? $_GET['order'] : 'ASC';
$views      = (isset($_GET['option'])) ? $_GET['option'] : 0;
$postsCount = (isset($_GET['postsCount'])) ? $_GET['postsCount'] : '';
$project_status = (isset($_GET['status'])) ? $_GET['status'] : '';


if( $project_status  !=""){ 

    if($project_status =="completed"){
        $tax = array(
            array(
              'taxonomy' => 'project_status',
              'field' => 'id',
              'terms' => 12 // Where term_id of Term 1 is "1".
            )
        );
    }
    else  if($project_status =="coming_soon"){
        $tax = array(
            array(
              'taxonomy' => 'project_status',
              'field' => 'id',
              'terms' => 13 // Where term_id of Term 1 is "1".
            )
        );
    }else{
        $tax = "";
    }

    $args = array(
    'post_type'       => 'post',
    'posts_per_page' => -1,
   'post_status'     => 'publish',
   'tax_query'    => $tax
  );

} else {
$args = array(
       
        'post_type' => $postType,
        'orderby' => 'menu_order',
        'order' => $order,
        'posts_per_page' => $numPosts,
        'paged' => $pageOffset,
        'tax_query' => array(
            array(
              'taxonomy' => 'project_status',
              'field' => 'term_id', 
              'terms' => 13,
             
            )
        )
    );
}


if (!empty($include)) {
        $include = explode(",", $include);
        $args['post__in'] = $include;
}
  

if (!empty($exclude)) {
    $exclude = explode(",", $exclude);
    $args['post__not_in'] = $exclude;
}


$myposts = new WP_Query($args);
$count    = $myposts->found_posts;

//print_r($myposts);

if($myposts->have_posts()): 
    
  
?>
<div class="communities-grid-rows" data-count="<?php echo $count; ?>">
    <div class="communities-grid-row open">
        <div class="communities-grid-main flex">
            <?php $i=1; while ($myposts->have_posts()) : $myposts->the_post(); 
                  
                    $thumbnail     = get_the_post_thumbnail_url( $post->ID );
					$alt_text      = get_post_meta( get_post_thumbnail_id( $post->ID ), '_wp_attachment_image_alt', true );
  					if(empty($thumbnail)){ // banner
						$hero_banner_image   = get_field( 'hero_banner_image' );
					    $thumbnail           = $hero_banner_image['url'];
						$alt_text            = $hero_banner_image['alt'];
						
					}  if(empty($thumbnail)){//deault from category
						$hero_banner_image        = get_field( 'hero_banner_image', 'category_6' );
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
                <div class="communities-grid-list">
                <div class="communities-grid-pos pos-relative">
								<div class="communities-grid-image">
									<figure class="communities-grid-thumb object-fit">
										<img loading="eager" src="<?php echo $thumbnail;  ?>" alt="<?php echo $alt;  ?>">
									</figure>
								</div>
								<div class="communities-grid-content flex">
									<div class="communities-grid-category flex">
                                        <?php echo implode(", ",$resultstr); ?>
										
									</div>
									<h3><a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
									<a href="<?php echo get_the_permalink(); ?>" class="button">More<span class="fa-solid fa-caret-right right-arrow"></span></a>
								</div>
							</div>
                </div>
                
            <?php $i++; endwhile; ?>
        </div>
    </div>
       
          
<?php   //else part
 wp_reset_postdata(); ?>
</div>
<?php endif; ?>
