<?php
/**
 * The template for displaying all pages
 */

get_header(); 
global $post;
$post_slug = $post->post_name;
?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>			
<section class="inner_page <?php if(is_page('feedback')) { echo "feedback_page"; } else { echo "about_page"; } ?>">
	<div class="container">
    	<div class="cms_txt">
			<?php
			if ( have_posts() ) { while ( have_posts() ) {
			the_post();
			$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
			if(get_the_content()){	
			if($featured_img_url) { 
			?>
			<img src="<?php echo $featured_img_url; ?>" alt="" class="alignright">
			<?php 
			}
			the_content();  }
			else {  echo '<h3 class="text-center">Coming Soon</h3>'; }
			} wp_reset_postdata();
			}  
			?>   
        </div>
    </div>
	<?php 
	if(is_page('about')) {
	if(have_rows('about_block_list')) { ?>
    <div class="value_weare_sec">
    	<div class="container">
			<?php while(have_rows('about_block_list')) { the_row(); 
			$about_block_title=get_sub_field('about_block_title');
			$about_image=get_sub_field('about_image');
			$about_content=get_sub_field('about_content');
			?>
        	<div class="valuewearebxrow">
				<?php if($about_image) { ?>
            	<div class="value_imgbx">
                    <img src="<?php echo $about_image['url']; ?>" alt="<?php echo $about_image['alt']; ?>">
                </div>
				<?php } if($about_content) { ?>
	        	<div class="value_bxcnt">
				<?php if($about_block_title) { ?>
                    <h2><?php echo $about_block_title; ?></h2>
				<?php } ?>
                    <?php echo $about_content; ?>
                </div>
				<?php } ?>
            </div>
			<?php } ?>
        </div>
    </div><!--value_weare_sec-->
	<?php } ?>
	<?php 
	$testimonial_image=get_field('testimonial_image');
	$client_testimonial_main_title=get_field('client_testimonial_main_title');
	$testimonial_list=get_field('testimonial_list');
	if($testimonial_list) {
	?>
    <div class="client_testimonial_sec" style="background:url(<?php if($testimonial_image) { echo $testimonial_image; } else { echo get_template_directory_uri().'/assets/images/bg_img3.jpg'; } ?>) no-repeat;">
    	<div class="container">
        	<div class="client_tesitmonialbx">
			<?php if($client_testimonial_main_title) { ?>
            	<span class="h2"><?php echo $client_testimonial_main_title; ?></span>
			<?php } ?>
                <div class="client_tesimonialslider">
					<?php 
					foreach($testimonial_list as $testimonial) { 
					$testimonial_name=get_the_title($testimonial->ID);
					$testimonial_content=$testimonial->post_content;
					?>
                	<div class="item">
                        <div class="slidquotetestimonial"><i class="fas fa-quote-left"></i></div>
                        <div class="slider_testimonialcnt">
                            <p><?php echo $testimonial_content; ?></p>
                        </div>
                        <span class="slidetestimonialclientname"><?php echo $testimonial_name; ?></span>
                    </div>
					<?php } ?>
                </div><!--client_tesimonialslider-->
            </div><!--client_tesitmonialbx-->
        </div>
    </div><!--client_testimonial_sec-->
	<?php } if(have_rows('faq_list')) { ?>
    <div class="faq_sec">
    	<div class="container">
        	<div class="faq_mainbx aboutfaq">
                <div id="accordion">
				<?php 
				$i=1;
				while(have_rows('faq_list')) { the_row(); 
				$question=get_sub_field('question');
				$answer=get_sub_field('answer');
				if($question && $answer) {
				?>
                    <div class="card">
                        <div class="card-header">
                          <a class="card-link <?php if($i==1) { } else { echo "card-link"; } ?>" data-toggle="collapse" href="#collapse<?php echo $i; ?>"><?php echo $question; ?><span class="icon"></span></a>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) { echo "show"; } ?>" data-parent="#accordion">
                            <div class="card-body">
                                <?php echo $answer; ?>
                            </div>
                        </div>
                    </div>
				<?php } $i++; } ?>
                   
                </div>
            </div>
        </div>
    </div><!--faq_sec-->
	<?php } } ?>
	<?php 
	if(is_page('feedback')) {
	$feedback_form_title=get_field('feedback_form_title');
	$feedback_form=get_field('feedback_form');
	if($feedback_form) {
	?>
	<div class="feedbackform_sec">
        <div class="container">
			<?php if($feedback_form_title) { ?>
        	<h2><?php echo $feedback_form_title; ?></h2>
			<?php } ?>
        	<div class="feedbackform contact-form">
            	<?php echo do_shortcode($feedback_form); ?>
            </div>
        </div>
    </div><!--feedbackform_sec-->
	<?php } ?>
	<?php 
	$feedback_title=get_field('feedback_title');
	$feedback_content=get_field('feedback_content');
	?>
	<div class="feedback_contentsec">
    	<div class="container">
			<?php if($feedback_title) { ?>
        	<h2><?php echo $feedback_title; ?></h2>
			<?php } ?>
            <div class="row">
			<?php if($feedback_content) { ?>
            	<div class="col-lg-8 col-md-8 col-sm-7">
                	<div class="cms_txt">
                       <?php echo $feedback_content; ?>
                    </div>
            	</div>
			<?php } 
			$phone=get_field('demo_phone_number','option');
			$mobile=get_field('demo_mobile_number','option');
			$email=get_field('demo_email_address','option');
			$address=get_field('demo_address','option');
			if($phone || $email || $address || $mobile) {  ?>
                <div class="<?php if($feedback_content) { echo "col-lg-4 col-md-4 col-sm-5"; } else { echo "col-lg-12 col-md-12 col-sm-12"; } ?>">
            		<div class="feedbackcontent_bx">
            			<h2>Tell us what you think.</h2>
                		<ul class="feedback_cntlist">
						<?php if($address) { ?>
                        	<li>
                            	<h4>Write to Us:</h4>
                                <?php echo $address; ?>
                            </li>
						<?php } if($phone || $mobile) { ?>
                            <li>
                            	<h4>Call Us:</h4>
								<?php if($phone) { ?>
                               	<a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>"><?php echo $phone; ?></a>
								<?php } if($mobile) { ?>
                                <a href="tel:<?php echo preg_replace('/\s/','',$mobile); ?>"><?php echo $mobile; ?></a>
								<?php } ?>
                            </li>
                            <?php } if($email) { ?>
                            <li>
                            	<h4>Email Us:</h4>
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
                            </li>
							<?php } ?>
                        </ul>
            		</div><!--feedbackcontent_bx-->
            	</div>
			<?php } ?>
            </div>
        </div>
    </div><!--feedback_contentsec-->
	<?php } ?>
</section><!--inner_page-->			
<?php get_footer(); ?>
