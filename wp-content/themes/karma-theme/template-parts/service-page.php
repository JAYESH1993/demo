<?php 

/*
Template Name: Project Template Page
*/
get_header();
if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>

<section class="inner_page service_page">
	<div class="service_rowbxsec">
    	<div class="container">
        	<div class="row">
			<?php 
				$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
				$posts_per_page = get_option('posts_per_page');
				$trip_args = array('posts_per_page' => '6','post_parent' => 0,'post_type' => DEMO_SERVICE_POST_TYPE,'post_status' => 'publish','paged' => $paged,'order'=>'asc');
				$service_query = new WP_Query($trip_args);
				if ($service_query) {
				while ($service_query->have_posts()) { $service_query->the_post();
				$custom_title=get_field('custom_title');
				if($custom_title) {
					$service_title=$custom_title; 
				}
				else {
					$service_title=get_the_title(); 
				}
				$service_url      = get_permalink();
				$service_content= strip_tags(get_the_content());
				$service_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'full');
				$no_image=site_url().'/wp-content/uploads/2020/10/noimage.jpg';
				if ($service_image) {
				$service_image_url = aq_resize($service_image[0], 406, 303, true, false, true);
				}
				else {
				$service_image_url = aq_resize($no_image, 406, 303, true, false, true);
				}
				?>
            	<div class="col-lg-4 col-md-4 col-sm-6 col-6">
                	<a href="<?php echo $service_url ?>" class="service_bx">
                    	<div class="service_img"><img src="<?php echo $service_image_url[0]; ?>" alt="<?php echo $service_title ?>"></div>
                        <div class="service_cnt">
                        	<h3><?php echo $service_title ?></h3>
                        </div>
                    </a>
                </div>
				<?php } wp_reset_postdata(); ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
				<div class="my_pagination">
					<?php 
					$big = 999999999; // need an unlikely integer
					echo paginate_links_cust( array('base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),'format' => '?paged=%#%','current' => max( 1, get_query_var('paged') ),'total' => $service_query->max_num_pages) );
					?>
				</div>
				</div>
			<?php  } else {  ?>
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<h3 class="text-center">Coming Soon</h3>
				</div>
			<?php } ?>
            </div>
        </div>
    </div>
</section><!--inner_page-->
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

