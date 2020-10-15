<?php get_header(); 
$phone=get_field('demo_phone_number','option');
$iphone = strpos($_SERVER['HTTP_USER_AGENT'], "iPhone");
$android = strpos($_SERVER['HTTP_USER_AGENT'], "Android");
$blackberry = strpos($_SERVER['HTTP_USER_AGENT'], "BlackBerry");
$ipod = strpos($_SERVER['HTTP_USER_AGENT'], "iPod");
$ipad = strpos($_SERVER['HTTP_USER_AGENT'], "iPad");
$banner_args = array('posts_per_page' => -1,'post_type' => 'banner','post_status' => 'publish','order'=>'ASC');
$banner_query = new WP_Query($banner_args);

$count=1;	
if ($banner_query) {
?>
<section class="home_banner">
	<div class="banner">
    	<div class="hl-banner-slider">
		<?php 
		while ($banner_query->have_posts()) { $banner_query->the_post(); 
		$title= get_the_title();
		$demo_banner_main_sub_title  = get_field('demo_banner_main_sub_title');
		$demo_banner_main_title  = get_field('demo_banner_main_title');
		$banner_button_text  = get_field('banner_button_text');
		$banner_button_url  = get_field('banner_button_url');
		$enable_option  = get_field('demo_status');
		$get_field_new      = (get_field('demo_status')) ? 'active' : '';
		if ($enable_option) {
		$destop_banner_url = get_field('demo_banner_image_desktop');
		$mobile_banner_url = get_field('demo_banner_image_mobile');
		if ($mobile_banner_url) {
		$mobile_banner_url = $mobile_banner_url['url'];
		} else {
		$mobile_banner_url = $destop_banner_url['url'];
		}
		}
		if ($iphone || $android || $ipod || $blackberry || $ipad) {
		$banner_filter = $mobile_banner_url;
		$banner_url = $banner_filter;
		}
		if (!($iphone || $android || $ipod || $blackberry || $ipad)) {
		$dest_banner_filter = $destop_banner_url['url'];
		$banner_url = $dest_banner_filter;
		}
		if($get_field_new) {
		?>
            <figure>
                <img src="<?php echo $banner_url; ?>" alt="<?php echo $destop_banner_url['alt'];?>">
                <figcaption>
                	<div class="container">
                		<div class="hbanner_cnt">
							<?php if($demo_banner_main_title) { ?>
                        	<h2><?php echo $demo_banner_main_title; ?></h2>
							<?php } if($demo_banner_main_sub_title) { ?>
                            <p><?php echo $demo_banner_main_sub_title; ?></p>
							<?php } ?>
                            <div class="banner-btn">
								<?php if($phone) { ?>
                            	<a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>" class="btn-main">CALL <?php echo $phone; ?></a>
								<?php } if($banner_button_url && $banner_button_text) { ?>
                                <a href="<?php echo $banner_button_url; ?>" class="btn-main yellowbtn"><?php echo $banner_button_text; ?></a>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </figcaption>
            </figure>
			<?php } $count++; } wp_reset_postdata(); ?>
		</div>  
    </div>
</section>
<?php } ?>
<?php 
$service_main_title=get_field('service_main_title');
$service_sub_text=get_field('service_sub_text');
$service_list=get_field('service_list');
$service_button_text=get_field('service_button_text');
$service_button_url=get_field('service_button_url');
?>
<section class="home_page">
	<div class="service_sec">
    	<div class="container">
		<?php if($service_main_title) { ?>
        	<span class="h2"><?php echo $service_main_title; ?></span>
		<?php } if($service_sub_text)  { ?>
            <div class="hservice_txt">
            	<p><?php echo $service_sub_text; ?></p>
            </div>
		<?php } ?>
            <div class="service_rowbxsec">
            	<div class="row">
				<?php 
					foreach($service_list as $service) {	
					setup_postdata($service); 
					$service_title=get_the_title($service->ID);
					$service_url=get_the_permalink($service->ID);
					$service_img = get_the_post_thumbnail_url($service->ID, 'full');
					$service_cnt = strip_tags($service->post_content);
					$service_filter_cont = substr($service_cnt, 0, 225);
					$no_img = site_url().'/wp-content/uploads/2020/10/noimage.jpg';
					if($service_img){
					$service_img_src = aq_resize($service_img, 390, 290, true, false, true);
					$service_img_link   = $service_img ? $service_img_src[0] : '';
					}
					else {
					$service_img_src = aq_resize($no_img, 390, 290, true, false, true);
					$service_img_link   = $service_img_src[0];
					}
				?>
            	<div class="col-lg-4 col-md-4 col-sm-6 col-6">
                	<a href="<?php echo $service_url; ?>" class="service_bx">
                    	<div class="service_img"><img src="<?php echo $service_img_link; ?>" alt="<?php echo $service_title; ?>"></div>
                        <div class="service_cnt">
                        	<h3><?php echo $service_title; ?></h3>
                        </div>
                    </a>
                </div>
				<?php } ?>
            </div>
			<?php if($service_button_url && $service_button_text) { ?>
            	<a href="<?php echo $service_button_url; ?>" class="btn-main"><?php echo $service_button_text; ?></a>
			<?php } ?>
            </div><!--service_rowbxsec-->
        </div>
    </div><!--service_sec-->
<?php 
$consultation_image=get_field('consultation_image');
$consultation_main_title=get_field('consultation_main_title');
$consultation_button_text=get_field('consultation_button_text');
$consultation_button_url=get_field('consultation_button_url');
?>
    <div class="requestconsultation_sec" style="background:url(<?php if($consultation_image)  { echo $consultation_image; } else { echo get_template_directory_uri().'/assets/images/bg_img1.jpg'; } ?>) no-repeat;">
    	<div class="container">
        	<div class="row">
			<?php if($consultation_main_title) { ?>
				<div class="col-lg-9 col-md-8 col-sm-12">
                	<div class="request_consult_txt">
                    	<span class="h2"><?php echo $consultation_main_title; ?></span>
                    </div>
                </div>
			<?php }  if($consultation_button_text && $consultation_button_url) { ?>
                <div class="col-lg-3 col-md-4 col-sm-12">
                	<a href="<?php echo $consultation_button_url; ?>" class="btn-main yellowbtn"><?php echo $consultation_button_text; ?></a>
                </div>
			<?php } ?>
            </div>
        </div>
    </div><!--requestconsultation_sec-->
<?php 
$about_background_image=get_field('about_background_image');
$about_main_title=get_field('about_main_title');
$about_button_text=get_field('about_button_text');
$about_button_url=get_field('about_button_url');
?>
    <div class="about_sec" style="background:url(<?php if($about_background_image) { echo $about_background_image; } else { echo get_template_directory_uri().'/assets/images/bg_img2.jpg'; } ?>) no-repeat;">
    	<div class="container">
        	<div class="row">
            	<div class="col-lg-12 col-md-12 col-sm-12">
                	<div class="about_secbx">
						<?php if($about_main_title) { ?>
                    	<span class="h2"><?php echo $about_main_title; ?></span>
						<?php } ?>
                    	<div class="wel_aboutcnt welcometxt">
                        	<?php while(have_posts()){ the_post();
							the_content(); 
							} ?>
                        </div><!--wel_aboutcnt-->
						<?php if($about_button_text && $about_button_url) { ?>
                        <a href="<?php echo $about_button_url; ?>" class="btn-main"><?php echo $about_button_text; ?></a>
						<?php } ?>
                    </div><!--about_secbx-->
                </div>
            </div>
        </div>
    </div><!--about_sec-->
	<?php 
	$testimonial_image=get_field('testimonial_image');
	$testimonial_main_title=get_field('testimonial_main_title');
	$testimonial_list=get_field('testimonial_list');
	if($testimonial_list) {
	?>
    <div class="client_testimonial_sec" style="background:url(<?php if($testimonial_image) { echo $testimonial_image; } else { echo get_template_directory_uri().'/assets/images/bg_img3.jpg'; } ?>) no-repeat;">
    	<div class="container">
        	<div class="client_tesitmonialbx">
				<?php if($testimonial_main_title) { ?>
            	<span class="h2"><?php echo $testimonial_main_title; ?></span>
				<?php } ?>
                <div class="client_tesimonialslider">
					<?php 
					foreach($testimonial_list as $testimonial) { 
					$testimonial_title=get_the_title($testimonial->ID);
					$testimonial_content=$testimonial->post_content;
					?>
                	<div class="item">
                        <div class="slidquotetestimonial"><i class="fas fa-quote-left"></i></div>
                        <div class="slider_testimonialcnt">
                            <p><?php echo $testimonial_content; ?></p>
                        </div>
                        <span class="slidetestimonialclientname"><?php echo $testimonial_title; ?></span>
                    </div>
					<?php } ?>
                </div><!--client_tesimonialslider-->
            </div><!--client_tesitmonialbx-->
        </div>
    </div><!--client_testimonial_sec-->
	<?php } ?>
	
<?php 
$we_can_support_main_title=get_field('we_can_support_main_title');
$we_can_support_image=get_field('we_can_support_image');
$we_can_support_sub_text=get_field('we_can_support_sub_text');
$we_can_support_button_text=get_field('we_can_support_button_text');
$we_can_support_button_url=get_field('we_can_support_button_url');
?>
    <div class="imagin_supportsec">
    	<div class="container">
        	<div class="row">
			<?php 
			if($we_can_support_image) { ?>
            	<div class="col-lg-6 col-md-6 col-sm-6">
                	<div class="imagin_imgsupport_bx">
                    	<img src="<?php echo $we_can_support_image['url']; ?>" alt="<?php echo $we_can_support_image['alt']; ?>">
                    </div>
                </div>
			<?php } ?>
                <div class="col-lg-6 col-md-6 col-sm-6">
                	<div class="imagin_supportcntbx">
					<?php if($we_can_support_main_title) { ?>
                    	<span class="h2"><?php echo $we_can_support_main_title; ?></span>
					<?php  } if($we_can_support_sub_text) { ?>
                        <div class="imagin_sptxtcntbx">
                        	<p><?php echo $we_can_support_sub_text; ?></p>
                        </div>
					<?php } if($we_can_support_button_url && $we_can_support_button_text) { ?>
                        <a href="<?php echo $we_can_support_button_url; ?>" class="btn-main"><?php echo $we_can_support_button_text; ?></a>
					<?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!--imagin_supportsec-->
<?php 
$make_an_enquiry_main_title=get_field('make_an_enquiry_main_title');
$make_an_enquiry_background_image=get_field('make_an_enquiry_background_image');
$make_an_enquiry_form_shortcode=get_field('make_an_enquiry_form_shortcode');
?>
    <div class="enquiery_sec" style="background:url(<?php if($make_an_enquiry_background_image) { echo $make_an_enquiry_background_image; } else { echo get_template_directory_uri().'/assets/images/bg_img4.jpg'; } ?>) no-repeat;">
    	<div class="container">
		<?php if($make_an_enquiry_main_title) { ?>
        	<span class="h2"><?php echo $make_an_enquiry_main_title; ?></span>
		<?php } ?>
            <div class="enquiery_formbx contact-form">
            	<?php echo do_shortcode($make_an_enquiry_form_shortcode); ?>
            </div>
        </div>
    </div><!--enquiery_sec-->
</section><!--home_page-->
<?php get_footer(); ?>