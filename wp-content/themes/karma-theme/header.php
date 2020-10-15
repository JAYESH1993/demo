<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js no-svg">
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="format-detection" content="telephone=no">
<link rel="shortcut icon" type="image/ico" href="<?php if(get_field('demo_favicon_icon', 'option')) {  echo get_field('demo_favicon_icon', 'option'); } else { echo get_template_directory_uri(); ?>/assets/images/favicon.ico<?php } ?>">
<?php echo demo_css_include(); ?>
<?php wp_head(); ?>
<?php $google_codeplace = get_field('demo_please_select_option_for_code_place', 'option');
if($google_codeplace == 'Header'){
echo get_field('demo_please_enter_google_analytics_code', 'option');
} ?>
</head>
<?php global $post;
$pagebody = $post->post_name;
?>
<body <?php body_class($pagebody); ?>>
<div class="site-main">
<noscript>
    <div class="noscript">
    	<p><i class="fa fa-exclamation-triangle fa-1"></i>Please enable JavaScript in your browser.</p>
    </div>
</noscript> 
  <!--header section starts-->
<header class="header">
	<div class="header_top">
    	<div class="container">
			<?php 
			$demo_address=get_field('demo_address','option');
			if($demo_address) { ?>
        	<div class="htadd_bx">
            	<p><span><i class="fas fa-map-marker-alt"></i></span><?php echo strip_tags($demo_address); ?></p>
            </div>
			<?php 
			}
			$phone=get_field('demo_phone_number','option'); 
			$email=get_field('demo_email_address','option'); 
			if($phone || $email) { 
			?>
            <div class="htrightcntbx">
				<?php if($phone) { ?>
            	<a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>" class="htcallbx"><i class="fas fa-phone"></i><span><?php echo $phone; ?></span></a>
				<?php } ?>
				<?php  if($email) { ?>
                <a href="mailto:<?php echo $email; ?>" class="htmailbx"><i class="fas fa-envelope"></i><span><?php echo $email; ?></span></a>
				<?php } ?>
            </div>
			<?php } ?>
        </div>
    </div><!--header_top-->
    <div class="header_main">
    	<div class="container">
        	<div class="row">
            	<div class="col-sm-12">
					<?php 
					$logo=get_field('demo_logo','option'); 
					if($logo) { 
					?>
                	<a href="<?php echo site_url(); ?>" class="logo"><img src="<?php echo $logo['url']; ?>" alt="<?php echo $logo['alt']; ?>"></a>
					<?php } ?>
                    <div class="headrright">
						<?php 
						$phone=get_field('demo_phone_number','option'); 
						$email=get_field('demo_email_address','option'); 
						if($phone || $email) { 
						?>
                    	<div class="header-mobilebx">
                            <div class="hmobicallmailbtn">
								<?php if($phone) { ?>
                                <a href="tel:<?php echo preg_replace('/\s/','',$phone); ?>" class="hcallbtn"><i class="fa fa-phone"></i></a>
								<?php  } if($email) { ?>
                                <a href="mailto:<?php echo $email; ?>" class="hmailbtn"><i class="fas fa-envelope"></i></a>
								<?php } ?>
                            </div>
                        </div>
						<?php } ?>
                        <div class="header-navigation">
                            <button class="navigation-toggle"><span class="span-icon"></span><span class="span-icon"></span><span class="span-icon"></span></button>
                            <div class="navigation">
                                <?php wp_nav_menu(array('menu' => 'Header Menu','menu_class' => 'menu', 'container' => '','walker' => new My_Walker_Nav_Menu() ));  ?>
                            </div><!--navigation-->
                        </div><!--header-navigation-->
						<?php 
						$header_button_text=get_field('header_button_text','option');
						$header_button_url=get_field('header_button_url','option');
						if($header_button_text && $header_button_url) { 
						?>
                        <a href="<?php echo $header_button_url; ?>" class="btn-main yellowbtn"><?php echo $header_button_text; ?></a>
						<?php } ?>
                   </div><!--headrright-->
                </div>
            </div><!--row-->
        </div><!--container-->
    </div><!--header_main-->    
</header>
<!--header section ends--> 