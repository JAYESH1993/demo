<?php 

/*
Template Name: Ndis Template Page
*/
get_header();
if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section class="inner_page ndis_page">
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
				<?php 
				$ndis_pdf_file=get_field('ndis_pdf_file'); 
				if($ndis_pdf_file) { 
				$ndis_pdf_url = $ndis_pdf_file['url'];
				$ndis_pdf_title = $ndis_pdf_file['title'];
    $newDate = date("d F Y", strtotime($ndis_pdf_file['date']));  
				

				?>
        	<div class="pdf_box_main">
                <div class="pdf_box">
                    <a href="#" title="download"><i class="fas fa-file-pdf pdf-icon"></i></a>
                    <div class="pdf_text">
                         <a class="pdf_title"  target="blank" href="<?php echo $ndis_pdf_url; ?>" title="<?php echo $ndis_pdf_title; ?>"><?php echo $ndis_pdf_title; ?></a>
                         <span>Updated on <?php echo $newDate; ?> </span>
                    </div>
                    <a href="<?php echo $ndis_pdf_url; ?>" target="blank" title="download"><i class="fa fa-download download-icon"></i></a>
                </div>
            </div>
				<?php } ?>
        </div>
        
    </div>
	<?php if(have_rows('ndis_faq’s')) { ?>
    <div class="faq_sec ndis_faqsec">
    	<div class="container">
        	<h2>NDIS FAQ’S</h2>
        	<div class="faq_mainbx ndisfaq">
                <div id="accordion">
				<?php 
				$i=1;
				while(have_rows('ndis_faq’s')) { the_row(); 
					$question=get_sub_field('question');
					$answer=get_sub_field('answer');
					if($question && $answer) {
				?>
                    <div class="card">
                        <div class="card-header">
                          <a class="card-link <?php if($i==1) { } else { echo "collapsed"; } ?>" data-toggle="collapse" href="#collapse<?php echo $i; ?>"><?php echo $question; ?><span class="icon"></span></a>
                        </div>
                        <div id="collapse<?php echo $i; ?>" class="collapse <?php if($i==1) { echo "show"; } ?>" data-parent="#accordion">
                            <div class="card-body">
                             <?php echo $answer; ?>
                            </div>
                        </div>
                    </div>
					<?php  } $i++; } ?>
                </div>
            </div>
        </div>
    </div><!--faq_sec-->
	<?php } ?>
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

