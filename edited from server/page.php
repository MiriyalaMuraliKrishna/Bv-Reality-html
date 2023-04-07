<?php 
get_header(); 
$hero_banner_image        = get_field( 'hero_banner_image' );
$hero_banner_image_mobile = get_field( 'hero_banner_image_mobile' );
$hero_banner_image_mobile = $hero_banner_image_mobile ? $hero_banner_image_mobile : $hero_banner_image;
$hero_banner_sub_heading = get_field( 'hero_banner_sub_heading' );
$hero_banner_heading = get_field( 'hero_banner_heading' );
$hero_banner_heading = $hero_banner_heading ? $hero_banner_heading : get_the_title();
$hero_banner_description = get_field( 'hero_banner_description' );
$hero_banner_button_text = get_field( 'hero_banner_button_text' );
$hero_banner_button_link = get_field( 'hero_banner_button_link' );
if(!empty($hero_banner_image)){?>
<section class="default-banner-section pos-relative">
<div class="default-banner-image background-bg">
	<?php if(!empty($hero_banner_image)){ ?>
		<picture class="default-banner-thumb object-fit">
			<source srcset="<?php echo $hero_banner_image['url']; ?>" media="(min-width: 768px)"/>
			<img loading="eager" src="<?php echo $hero_banner_image_mobile['url']; ?>" alt="<?php echo $hero_banner_image_mobile['url']; ?>"/>
		</picture>
	<?php } ?>
</div>
<?php if(!empty($hero_banner_description || $hero_banner_heading )){ ?>
<div class="container">
	<div class="default-banner-main">
		<div class="default-banner-text pos-relative">
			<div class="banner-left-line" data-animation="fade-in-left"></div>
			<?php  if(!empty($hero_banner_heading)){ ?>
			    	<h1><?php echo $hero_banner_heading; ?></h1>
			<?php } if(!empty($hero_banner_description)){ 
				echo $hero_banner_description;
			} if(!empty($hero_banner_button_text && $hero_banner_button_link)){?>
				<a href="<?php echo $hero_banner_button_link; ?>" class="button"><?php echo $hero_banner_button_text; ?><span class="fa-solid fa-caret-right right-arrow"></span></a>
			<?php } ?>
		</div>
	</div>
</div>
<?php } ?>
</section>
<?php }
$flexible_default_content = get_field('flexible_default_content');?>
<section class="default-content-section">
	<div class="container md">
		<div class="default-content-wrap">
				<?php if(!empty($flexible_default_content)){
					echo $flexible_default_content;
				} ?>
			
		</div>
	</div>
</section>
<?php 
$features_heading      = get_field( 'features_heading');
$features_description  = get_field( 'features_description');
if ( have_rows('our_features') ) :?>
<section class="optional-feature-section">
<div class="container">
	<div class="optional-feature-main">
		<div class="optional-feature-head">
			<?php if(!empty($features_heading )){?>
					<h2><?php echo $features_heading; ?></h2>
			<?php }	if(!empty($features_description )){
				echo $features_description;
			} ?>
		</div>
		<?php if ( have_rows('our_features') ) : ?>
			<div class="optional-feature-row flex">
			 	<?php while ( have_rows('our_features') ) : the_row();
					$features_icon        = get_sub_field('features_icon');
					$features_heading     = get_sub_field('features_heading');
					$features_description = get_sub_field('features_description');
					 ?>
					<div class="optional-feature-list flex">
						<?php if(!empty($features_icon )){?>
							<figure class="optional-feature-icon" data-animation="fade-in-down">
								<img src="<?php echo $features_icon['url'];  ?>" alt="<?php echo $features_icon['alt'];  ?>">
							</figure>
						<?php } if(!empty($features_heading ||  $features_description )){?>
							<div class="optional-feature-text">
								<?php if(!empty($features_heading )){?>
									<h4><span><?php echo $features_heading; ?></span></h4>
								<?php } if(!empty($features_description )){
									 echo $features_description;
								 } ?>
							</div>
						<?php } ?>
					</div>
				<?php endwhile; wp_reset_postdata();?>
			</div>
		<?php endif; ?>
</div>
</section>
<?php endif;
$performance_sub_heading  = get_field( 'performance_sub_heading');
$performance_heading      = get_field( 'performance_heading');
$performance_description  = get_field( 'performance_description');
if(!empty($performance_heading  || $performance_description || have_rows('performance_icons'))){?>
<section class="graph-performance pos-relative">
	<div class="graph-bg">
		<picture class="object-fit graph-bg-thumb">
			<source srcset="<?php echo get_stylesheet_directory_uri(); ?>/images/confirmation-bg-image@2x.jpg" media="(min-width: 768px)">
			<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/confirmation-bg-image@2x.jpg" alt="confirmation-bg-image">
		</picture>
	</div>
	<div class="container">
		<div class="graph-performance-wrap">
			<div class="graph-content flex">
				<?php if ( have_rows('performance_icons') ) : ?>
					<div class="graph-location pos-relative">
						<?php 
						$number = array('one','two','three','four');
						$i=1; while ( have_rows('performance_icons') ) : the_row();
							$performance_icon        = get_sub_field('performance_icon');?>
							<div class="graph-img <?php echo $number[$i]; ?>" data-value="<?php echo $i; ?>">
								<?php if(!empty($performance_icon )){?>
									<figure class="object-fit graph-thumb pos-relative">
										<img src="<?php echo $performance_icon['url'];  ?>" alt="<?php echo $performance_icon['alt'];  ?>">
									</figure>
								<?php } ?>
								<div class="graph-dot pos-relative">
									<span></span>
									<span></span>
								</div>
							</div>
						<?php $i++;  endwhile; wp_reset_postdata();?>	
					</div>
				<?php endif; ?>
				<div class="graph-text">
					<span class="graph-sub-title"><?php echo $performance_sub_heading; ?></span>
					<?php if(!empty($performance_heading )){?>
							<h2><?php echo $performance_heading; ?></h2>
					<?php } if(!empty($performance_description )){
							echo $performance_description;
					} ?>
				</div>
			</div>
			<?php if ( have_rows('performance_statistics') ) : ?>
			<div class="graph-number flex">
				<?php  while ( have_rows('performance_statistics') ) : the_row();
						$performance_statistics_icon        = get_sub_field('performance_statistics_icon');
						$performance_statistics_number      = get_sub_field('performance_statistics_number');
						$performance_statistics_heading     = get_sub_field('performance_statistics_heading');
						$performance_statistics_statistic   = get_sub_field('performance_statistics_statistic');		
						?>
						<div class="graph-number-list flex">
							<?php if(!empty($performance_heading )){?>
							<div class="graph-number-icon">
								<figure class="object-fit">
									<img src="<?php echo $performance_statistics_icon['url'];  ?>" alt="<?php echo $performance_statistics_icon['alt'];  ?>">
								</figure>
							</div>
							<?php } ?>
							<div class="graph-number-value">
								<div class="graph-number-count">
									<?php if(!empty($performance_statistics_number )){?>
									<div class="graph-count"><?php echo $performance_statistics_number; ?></div>
									<?php } if(!empty($performance_statistics_heading )){?>
										<span><?php echo $performance_statistics_heading; ?></span>
									<?php } ?>
								</div>
								<?php if(!empty($performance_statistics_statistic )){
									echo '<p>'.$performance_statistics_statistic.'</p>';
								} ?>
							</div>
						</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
			<?php endif; ?>
		</div>
	</div>
</section>
<?php } 
$cotinued_content  = get_field( 'cotinued_content');
$bottom_content    = get_field( 'bottom_content');
$select_project = get_field('select_project');
?>
<section class="default-content-section">
	<div class="container md">
		<div class="default-content-wrap">
			<?php if(!empty($cotinued_content)){
				echo $cotinued_content;
			} if(!empty($bottom_content )){
				echo $bottom_content ;
			} ?>
		</div>
	</div>
</section>  
<?php 
get_footer(); ?>