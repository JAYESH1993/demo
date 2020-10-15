<?php get_header(); ?>
<?php if(function_exists('demo_custom_innner_banner_code')) demo_custom_innner_banner_code(); ?>
<section class="inner_page blog_page">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-9 col-md-8 col-sm-12">
            	<div class="blog_bxmain">
                	<div class="row">
					<?php $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;  
									  $post_per_page ='12';
									  $testi_args = array (
										'posts_per_page' => $post_per_page,
										'post_type' => 'post',
										'post_Status' => 'publish',
										'paged' => $paged,
										'order' => 'ASC'
										);
									  $post_query = new Wp_query($testi_args);
									   $i=1; 
									   
									  if(have_posts()){
										while (have_posts()) {
										the_post();

										$id = get_the_ID();
										$solution_title=get_the_title($id);
										$solution_url=get_the_permalink($id);
										$solution_author=get_the_author_meta('display_name');
										$solution_date = get_the_date( 'j M, Y' ); 
										$feature_img = get_the_post_thumbnail_url($id, 'full');
										$no_img = site_url().'/wp-content/uploads/2019/10/no-img.jpg';
										if($feature_img){
										$feature_img_src = aq_resize($feature_img, 370, 265, true, false, true);
										$feature_img_link   = $feature_img ? $feature_img_src[0] : '';
										}
										else {
										$feature_img_src = aq_resize($no_img, 370, 265, true, false, true);
										$feature_img_link   = $feature_img_src[0];
										}
										
									?>
            			<div class="col-lg-6 col-md-6 col-sm-6">
                			<div class="explorblog_bx">
                    			<a href="<?php echo $solution_url; ?>" class="hexploreimg"><img src="<?php echo $feature_img_link; ?>" alt="<?php echo $solution_title; ?>"></a>
                        		<div class="hexplorecnt">
                        			<ul>
										
									
                                        <li><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 511.634 511.634" style="enable-background:new 0 0 511.634 511.634;" xml:space="preserve"><path d="M482.513,83.942c-7.225-7.233-15.797-10.85-25.694-10.85h-36.541v-27.41c0-12.56-4.477-23.315-13.422-32.261
        C397.906,4.475,387.157,0,374.591,0h-18.268c-12.565,0-23.318,4.475-32.264,13.422c-8.949,8.945-13.422,19.701-13.422,32.261v27.41 h-109.63v-27.41c0-12.56-4.475-23.315-13.422-32.261C178.64,4.475,167.886,0,155.321,0H137.05 c-12.562,0-23.317,4.475-32.264,13.422c-8.945,8.945-13.421,19.701-13.421,32.261v27.41H54.823c-9.9,0-18.464,3.617-25.697,10.85
        c-7.233,7.232-10.85,15.8-10.85,25.697v365.453c0,9.89,3.617,18.456,10.85,25.693c7.232,7.231,15.796,10.849,25.697,10.849h401.989 c9.897,0,18.47-3.617,25.694-10.849c7.234-7.234,10.852-15.804,10.852-25.693V109.639 C493.357,99.739,489.743,91.175,482.513,83.942z M137.047,475.088H54.823v-82.23h82.224V475.088z M137.047,374.59H54.823v-91.358
         h82.224V374.59z M137.047,264.951H54.823v-82.223h82.224V264.951z M130.627,134.333c-1.809-1.809-2.712-3.946-2.712-6.423V45.686
        c0-2.474,0.903-4.617,2.712-6.423c1.809-1.809,3.946-2.712,6.423-2.712h18.271c2.474,0,4.617,0.903,6.423,2.712 c1.809,1.807,2.714,3.949,2.714,6.423v82.224c0,2.478-0.909,4.615-2.714,6.423c-1.807,1.809-3.946,2.712-6.423,2.712H137.05
        C134.576,137.046,132.436,136.142,130.627,134.333z M246.683,475.088h-91.365v-82.23h91.365V475.088z M246.683,374.59h-91.365
         v-91.358h91.365V374.59z M246.683,264.951h-91.365v-82.223h91.365V264.951z M356.323,475.088h-91.364v-82.23h91.364V475.088z
        M356.323,374.59h-91.364v-91.358h91.364V374.59z M356.323,264.951h-91.364v-82.223h91.364V264.951z M349.896,134.333
        c-1.807-1.809-2.707-3.946-2.707-6.423V45.686c0-2.474,0.9-4.617,2.707-6.423c1.808-1.809,3.949-2.712,6.427-2.712h18.268
        c2.478,0,4.617,0.903,6.427,2.712c1.808,1.807,2.707,3.949,2.707,6.423v82.224c0,2.478-0.903,4.615-2.707,6.423
        c-1.807,1.809-3.949,2.712-6.427,2.712h-18.268C353.846,137.046,351.697,136.142,349.896,134.333z M456.812,475.088h-82.228v-82.23 h82.228V475.088z M456.812,374.59h-82.228v-91.358h82.228V374.59z M456.812,264.951h-82.228v-82.223h82.228V264.951z"/></svg><?php echo $solution_date; ?></li>
		
		
		
								  
                                        <li><svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 409.165 409.164" style="enable-background:new 0 0 409.165 409.164;" xml:space="preserve"><path d="M204.583,216.671c50.664,0,91.74-48.075,91.74-107.378c0-82.237-41.074-107.377-91.74-107.377 c-50.668,0-91.74,25.14-91.74,107.377C112.844,168.596,153.916,216.671,204.583,216.671z"/><path d="M407.164,374.717L360.88,270.454c-2.117-4.771-5.836-8.728-10.465-11.138l-71.83-37.392 c-1.584-0.823-3.502-0.663-4.926,0.415c-20.316,15.366-44.203,23.488-69.076,23.488c-24.877,0-48.762-8.122-69.078-23.488 c-1.428-1.078-3.346-1.238-4.93-0.415L58.75,259.316c-4.631,2.41-8.346,6.365-10.465,11.138L2.001,374.717
        c-3.191,7.188-2.537,15.412,1.75,22.005c4.285,6.592,11.537,10.526,19.4,10.526h362.861c7.863,0,15.117-3.936,19.402-10.527
        C409.699,390.129,410.355,381.902,407.164,374.717z"/></svg><?php echo $solution_author; ?></li>
                                    </ul>
                        			<h4><?php echo $solution_title; ?></h4>
                            		<a href="<?php echo $solution_url; ?>" class="readmorbtn" title="Read More">Read More</a>
                        		</div>
                    		</div>
                		</div>
						<?php  $i++; } wp_reset_postdata();   ?>
								<?php
											  $big = 999999999; // need an unlikely integer
											  echo paginate_links_cust( array(
												'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
												'format' => '?paged=%#%',
												'current' => max( 1, get_query_var('paged') ),
												'total' => $post_query->max_num_pages
											  ) );
											  ?>
								  <?php } ?>
				</div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-12 sidebar_listing">
            	<div class="accordion" id="accordion">
              		<div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Categories</button>
                            </h5>
                        </div>
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <ul>
                                    <li class="selected"><a href="<?php echo site_url(); ?>/blog" title="Blog">Blog</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Archives</button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="archives_main">
                                    <ul>
                                        <li>
                                            <div class="select_box">
                                                <span class="select_arrow"><i class="fas fa-angle-down"></i></span>
												<select name="Select Month"  class="form-control" onchange="document.location.href=this.options[this.selectedIndex].value;">
														  <option value=""><?php echo esc_attr( __( 'Select Month' ) ); ?></option> 
														  <?php wp_get_archives( array( 'type' => 'monthly', 'format' => 'option', 'show_post_count' => 1 ) ); ?>
												</select>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php 
					$post_tags = get_tags();
					if($post_tags) { 
					?>
					
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">Tags</button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                <div class="tags-box">
									<?php 
									foreach( $post_tags as $tag ) { ?>
                                    <a href="<?php echo get_tag_link($tag->term_id); ?>" title="<?php echo $tag->name; ?>"><?php echo $tag->name; ?></a>
									<?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>