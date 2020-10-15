<?php 
$footer_title_one=get_field('footer_title_one','option');
$footer_title_two=get_field('footer_title_two','option');
$footer_title_three=get_field('footer_title_three','option');
$address_label=get_field('demo_address_label','option');
$ndis_logo=get_field('ndis_logo','option');
$ndis_text=get_field('ndis_text','option');
$reg_label=get_field('demo_reg_label','option');
$reg_number=get_field('demo_reg_number','option');
$phone=get_field('demo_phone_number','option');
$mobile=get_field('demo_mobile_number','option');
$email=get_field('demo_email_address','option');
$address=get_field('demo_address','option');
$facebook=get_field('demo_facebook_url','option');
$twitter=get_field('demo_twitter_url','option');
$instagram=get_field('demo_instagram_url','option');

?>
<footer>
	<div class="footer_main">
        <div class="container">
        	<div class="row">
                <div class="col-lg-3 col-md-2 col-sm-12">
                    <div class="mobile-accordion mobile-toggle">
					<?php if($footer_title_one) { ?>
                        <h4 class="title"><?php echo $footer_title_one; ?><span></span></h4>
					<?php } ?>
                        <div class="mobile-accordion-toggle">
							<?php wp_nav_menu(array('menu' => 'Footer Menu','menu_class' => 'footer_menulist', 'container' => '','walker' => new My_Walker_Nav_Menu() ));  ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-12">
                    <div class="mobile-accordion mobile-toggle">
					<?php if($footer_title_two) { ?>
                        <h4 class="title"><?php echo $footer_title_two; ?><span></span></h4>
					<?php } ?>
                        <div class="mobile-accordion-toggle">
                            <?php wp_nav_menu(array('menu' => 'Services Menu','menu_class' => 'footer_menulist', 'container' => '','walker' => new My_Walker_Nav_Menu() ));  ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="mobile-accordion mobile-toggle">
						<?php if($ndis_logo) { ?>
                        <h4 class="title flogo_ndis"><img src="<?php echo $ndis_logo['url']; ?>" alt="<?php echo $ndis_logo['alt']; ?>"><span></span></h4>
						<?php } ?>
                        <div class="mobile-accordion-toggle">
						<?php if($reg_number) { ?>
                            <span class="regnmb"><?php echo $reg_label; ?>: <?php echo $reg_number; ?></span>
						<?php } ?>
                            <div class="karma_associationbx">
                            	<h3><?php echo bloginfo('name'); ?></h3>
								<?php if($ndis_text) { ?>
                                <p><?php echo $ndis_text ?></p>
								<?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-12">
                    <div class="mobile-accordion mobile-toggle">
						<?php if($address_label) { ?>
                        <h4 class="title ftitle"><?php echo $address_label; ?><span></span></h4>
						<?php } ?>
                        <div class="mobile-accordion-toggle">
							<?php if($address) { ?>
                            <div class="footer_add_bx">
                                <p><?php echo $address; ?></p>
                            </div>
							<?php } ?>
							<?php if($phone || $email || $mobile) { ?>
                            <div class="footer_contactbx">
								<?php if($phone) { ?>
                                <a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>"><?php echo $phone; ?></a>
								<?php } if($mobile) { ?>
                                <a href="tel:<?php echo preg_replace('/\s/','',$mobile); ?>"><?php echo $mobile; ?></a>
								<?php } if($email) { ?>
                                <a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a>
								<?php } ?>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!--footer_main-->
	<?php if($facebook || $twitter || $instagram) { ?>
    <div class="footer_social_sec">
    	<div class="container">
        	<ul class="footer_sociallist">
            	<li><a href="<?php echo $facebook; ?>" target="blank"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="<?php echo $twitter; ?>" target="blank"><i class="fab fa-twitter"></i></a></li>
                <li><a href="<?php echo $instagram; ?>" target="blank"><i class="fab fa-instagram"></i></a></li>
            </ul>
        </div>
    </div><!--footer_social_sec-->
	<?php } ?>
	<?php 
	$copyright_text=get_field('demo_copyright_text','option');
	$site_year = date("Y") .' '. get_bloginfo('name'); 
	?>
    <div class="footer_cpyright_sec">
    	<div class="container">
        	<p>© <?php if($copyright_text) { echo date('Y').' '.$copyright_text; } else  { echo $site_year.', All Rights Reserved.';   }  ?></p>
        </div>
    </div>
</footer>

<div class="scroll-top transition" title="Move to Top">
    <span class="fas fa-caret-up"></span>
</div>	
<?php wp_footer(); ?>
<?php echo demo_js_include(); ?>
<?php $google_codeplace = get_field('demo_please_select_option_for_code_place', 'option');
if($google_codeplace == 'Footer'){
    echo get_field('demo_please_enter_google_analytics_code', 'option');
} ?>

</div>
</body>
</html>




