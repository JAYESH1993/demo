<?php
/**
 * The template for displaying all pages
 */

get_header(); ?>
<div class="container-main">
	<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
	<section class="inner-page cms-page">
		<div class="container">
			<div class="row">
				<div class="col-12">
				<?php 
				if ( have_posts() ) 
				{
					while ( have_posts() ) 
					{ 
						the_post();
						if(get_the_content()){	the_content();  }
						else {  echo '<center><h3>Coming Soon</h3></center>'; }
					} wp_reset_postdata();
				}  ?>	
				</div>
			</div>
		</div>
	</section>
</div>
<?php get_footer(); ?>
