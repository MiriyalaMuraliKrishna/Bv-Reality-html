<?php
/*
Template Name: Contact Template
*/
get_header();
$hero_banner_image        = get_field( 'hero_banner_image' );
$hero_banner_image_mobile = get_field( 'hero_banner_image_mobile' );
$hero_banner_image_mobile = $hero_banner_image_mobile ? $hero_banner_image_mobile : $hero_banner_image;
$hero_banner_sub_heading  = get_field( 'hero_banner_sub_heading' );
$hero_banner_heading      = get_field( 'hero_banner_heading' );
$hero_banner_heading      = $hero_banner_heading ? $hero_banner_heading : get_the_title();
$hero_banner_description  = get_field( 'hero_banner_description' );
$our_office_heading       = get_field( 'our_office_heading' );
$our_office_description   = get_field( 'our_office_description' );
$our_office_address       = get_field( 'our_office_address' );
$our_office_phone_number  = get_field( 'our_office_phone_number' );
$our_office_address_heading = get_field('our_office_address_heading');
$contact_form_id         = get_field('contact_form_id');
?>
<section class="contact-page-section pos-relative">
        <div class="contact-page-bg">
            <picture class="contact-page-thumb object-fit">
                <source srcset="/wp-content/uploads/2023/03/confirmation-bg-image@2x.jpg" media="(min-width: 768px)"/>
                <img loading="eager" src="/wp-content/uploads/2023/03/company-banner-mobile@2x.jpg" alt="contact-bg-image"/>
            </picture>
        </div>
    	<div class="container">
		<div class="contact-page-wrap">
            <?php if(!empty($hero_banner_description || $hero_banner_heading )){ ?>
                <div class="contact-page-head pos-relative">
                    <div class="contact-dot-loc dot-location"><span class="dot-pulse dot-pulse1"></span><span class="dot-pulse dot-pulse2"></span><span class="dot-pulse dot-pulse3"></span></div>
                    <div class="contact-heading">
                    <?php if(!empty($hero_banner_heading)){ ?>
			    	    <h1><?php echo $hero_banner_heading; ?></h1>
				    <?php } if(!empty($hero_banner_description)){
                            echo $hero_banner_description;
                    } ?>
                    </div>
                </div>
            <?php } ?>
			<div class="contact-page-main flex">
                <?php if(!empty($contact_form_id)){ ?>
				<div class="contact-page-form">
                    <div class="frm_fields_container">
                        <?php echo do_shortcode($contact_form_id); ?>
                    </div>
				</div>
                <?php } ?>
				<div class="contact-page-text">
                    <?php if(!empty($our_office_heading || $our_office_description)){ ?>
                        <div class="contact-page-desc">
                            <?php if(!empty($our_office_heading)){ ?>
                                <h2><?php echo $our_office_heading; ?></h2>
                            <?php } if(!empty($our_office_description)){ 
                                echo $our_office_description;
                            } ?>
                        </div>
                    <?php } ?>
					<div class="contact-address">
						<div class="address-list flex">
                            <?php if(!empty($our_office_address )){ ?>
                                <span class="fa-sharp fa-solid fa-location-dot contact-icon"></span>
                                <address class="contact-icon-text">
                                    <?php if(!empty($our_office_address_heading)){ ?>
                                        <span><?php echo $our_office_address_heading; ?></span>
                                    <?php } if(!empty($our_office_address )){ 
                                        echo $our_office_address; 
                                    } ?>
                                </address>
                            <?php } ?>
						</div>
                        <?php if(!empty($our_office_phone_number )){ ?>
                            <div class="address-list flex">
                                <a href="tel:<?php echo $our_office_phone_number; ?>"><span class="fa-solid fa-phone contact-icon"></span><span class="contact-icon-text"><?php echo $our_office_phone_number; ?></span></a>
                            </div>
                        <?php } ?>
					</div>
				</div>
			</div>
		</div>
</section>
<?php
get_footer();
?>