<?php
/**
 *  Template Name: Contact Page
 */


get_header(); 
if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code();
$address_label=get_field('demo_address_label','option');
$phone_label=get_field('demo_phone_number_label','option');
$email_label=get_field('demo_email_address_label','option');
$web_label=get_field('demo_web_label','option');
$address = get_field('demo_address', 'option');
$email= get_field('demo_email_address', 'option');
$phone= get_field('demo_phone_number', 'option');
$mobile= get_field('demo_mobile_number', 'option');
$web= get_field('demo_web_url', 'option');
$contact_form_title=get_field('contact_form_title');
$contact_form=get_field('contact_form_shortcode');
$map_title=get_field('demo_map_title','option');
$map_iframe=get_field('map_iframe','option');
?>
<section class="inner_page contact_page">
	<div class="container">
    	<div class="contact_bxmain">
        	<div class="row">
			<?php if($address) { ?>
            	<div class="col-lg-3 col-md-3 col-sm-6 col-6">
                	<div class="item-contact">
                        <i class="fas fa-map-marker-alt"></i>
                        <div class="item-contact_box">
						<?php if($address_label) { ?>
                            <h5><?php echo $address_label; ?></h5>
						<?php } ?>
                            <p><?php echo $address; ?></p>
                        </div>
                    </div>
                </div>
			<?php } if($phone || $mobile) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                	<div class="item-contact">
                    	<i class="fas fa-phone-volume"></i>
                        <div class="item-contact_box">
                           <?php if($phone_label) { ?>
                            <h5><?php echo $phone_label; ?></h5>
						<?php } ?>
						<?php if($phone) { ?>
                            <a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>"><?php echo $phone; ?></a>
						<?php } if($mobile){ ?>
                            <a href="tel:<?php echo preg_replace('/\s/','',$mobile); ?>"><?php echo $mobile; ?></a>
						<?php } ?>
                        </div>
                    </div>
                </div>
			<?php } if($email) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                	<a href="mailto:<?php echo $email; ?>" class="item-contact">
                        <i class="fas fa-envelope"></i>
                        <div class="item-contact_box">
                           <?php if($email_label) { ?>
                            <h5><?php echo $email_label; ?></h5>
						<?php } ?>
                            <p><?php echo $email; ?></p>
                        </div>
                    </a>
                </div>
			<?php } if($web) { ?>
                <div class="col-lg-3 col-md-3 col-sm-6 col-6">
                	<a href="<?php echo $web; ?>" target="blank" class="item-contact">
                        <i class="fa fa-globe"></i>
                        <div class="item-contact_box">
                            <?php if($web_label) { ?>
                            <h5><?php echo $web_label; ?></h5>
						<?php } ?>
                            <p><?php echo $web; ?></p>
                        </div>
                    </a>
                </div>
			<?php } ?>
            </div>
        </div>
        <div class="conatctform_contactmap_sec">
        	<div class="row">
			<?php if($contact_form)  { ?>
        		<div class="col-lg-7 col-md-7 col-sm-12">
					<?php if($contact_form_title) { ?>
                	<h2><?php echo $contact_form_title; ?></h2>
					<?php } ?>
            		<div class="contactform_main contact-form">
                        <?php echo do_shortcode($contact_form); ?>
                    </div>
                </div>
				<?php 
				}
				if($map_iframe) { ?>
                <div class="col-lg-5 col-md-5 col-sm-12">
                	<div class="contact_map">
						<?php if($map_title) { ?>
                    	<h2><?php echo $map_title; ?></h2>
						<?php } ?>
                    	<?php echo $map_iframe; ?>
                    </div>
                </div>
				<?php } ?>
            </div>
        </div>
    </div>
</section><!--inner_page-->
<?php get_footer(); ?>