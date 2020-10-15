<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); 
if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code();
?>

<section class="inner_page about_page">
			<div class="container">
			<div class="cms_txt">
				<div class="text-center">
					<h2>404</h2>
					<h3>Looking for something?</h3>
					<p>We are sorry. The Web address you entered is not a functioning page on our site</p>
					<p>Go to <a href="<?php echo esc_url(home_url('/')); ?>" title="Home Page">Home Page</a></p>
				</div>
			</div>
			</div>
</section>
<?php get_footer(); ?>