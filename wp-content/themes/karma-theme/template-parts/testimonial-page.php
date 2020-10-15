<?php 

/*
Template Name: Testimonial Template Page
*/
get_header();
demo_custom_innner_banner_code(); ?>
<section class="inner_page testimonial_page">
	<div class="container">
		<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$testimonial_args = array(
		'post_type' => DEMO_TESTIMONIAL_POST_TYPE,
		'post_status' => 'publish',
		'posts_per_page' => 12,
		'order' => 'DESC',
		'paged' => $paged,
		);
		$testimonial_post = new WP_Query( $testimonial_args );
		if ( $testimonial_post -> have_posts() ) {
		while ( $testimonial_post -> have_posts() ){ $testimonial_post -> the_post();
		$testimonial_title=get_the_title();
		?>
    	<div class="testimonial-list">
            <div class="testimonialpage_main">
                <div class="testimonial_quote"><i class="fas fa-quote-left"></i></div>  	
                <div class="testimonial_text">
                    <?php the_content(); ?>
					<?php if($testimonial_title) { ?>
                    <span class="testimonial_client">- <?php echo $testimonial_title; ?></span>
					<?php } ?>
                </div>
            </div>
        </div>
		<?php }   wp_reset_postdata(); 
		$big = 999999999; // need an unlikely integer
		echo paginate_links_cust( array(
		'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $testimonial_post->max_num_pages
		) );
		} else { ?>
		<h3 class="text-center">Coming Soon</h3>
		<?php } ?>
</div>
</section>

<?php get_footer(); ?>

