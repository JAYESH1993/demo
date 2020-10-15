<?php $main_id = get_the_ID();
get_header(); 
if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); 
?>
<section class="inner_page servicedetail_page">
	<div class="container">
    	<div class="servicedetails_cntbx">
        	<?php
			if ( have_posts() ) { while ( have_posts() ) {
			the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
			if(get_the_content()){	
			if($featured_img_url) { 
			?>
			<img src="<?php echo $featured_img_url; ?>" alt="" class="alignleft">
			<?php 
			}
			the_content();  }
			else {  echo '<h3 class="text-center">Coming Soon</h3>'; }
			} wp_reset_postdata();
			}  
			?>   
        </div>
    </div>
</section><!--inner_page-->
<?php 
	$posts_per_page = get_option('posts_per_page');
	$service_args = array('posts_per_page' => '-1','post_type' => DEMO_SERVICE_POST_TYPE,'post_status' => 'publish','order'=>'ASC','post__not_in'=> array(get_the_ID()));
	$service_post = new WP_Query( $service_args );
	if ( $service_post -> have_posts() ) {
	?>
<div class="service_slider_sec">
	<div class="container">
    	<h2>Our Services</h2>
        <div class="serviceslider">
		<?php 
				while ( $service_post->have_posts() ) { $service_post->the_post();
				$service_title=get_the_title();
				$service_url=get_the_permalink();
				$service_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$no_img = site_url().'/wp-content/uploads/2020/09/noimage.jpg';
				if($service_image){
				$service_img_src = aq_resize($service_image[0], 270, 201, true, false, true);
				}
				else{
				$no_image=site_url().'/wp-content/uploads/2020/10/noimage.jpg';
				$service_img_src = aq_resize( $no_image, 270, 201, true, false, true );
				}
				?>
        	<div class="item">
            	<a href="<?php echo $service_url; ?>" class="serslider_bx">
                	<div class="servic_imgslider"><img src="<?php echo $service_img_src[0]; ?>" alt="<?php echo $service_title; ?>"></div>
                    <div class="ser_slide_cntbx">
                    	<h5><?php echo $service_title; ?></h5>
                    </div>
                </a>
            </div>
			<?php  } wp_reset_query();  ?>
        </div><!--serviceslider-->
    </div>
</div><!--service_slider_sec-->
	<?php } ?>
<?php 
$consultation_image=get_field('consultation_image',2);
$consultation_main_title=get_field('consultation_main_title',2);
$consultation_button_text=get_field('consultation_button_text',2);
$consultation_button_url=get_field('consultation_button_url',2);
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
<?php get_footer(); ?>
