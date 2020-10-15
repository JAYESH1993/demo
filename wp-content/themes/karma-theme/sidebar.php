<?php
/**
 * The sidebar containing the main widget area
 */
$main_id = $post->ID;
?>
<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 sidebar_listing">
    <div class="accordion" id="accordion">
        <div class="card">
            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                        Recent Posts
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <ul>
                        <?php
                        $services_args = array(
                            'posts_per_page' => 5,
                            'post_type' => 'post',
                            'post_status' => 'publish'
                        );

                        $services_post = get_posts($services_args);
                        $j = 1;

                        foreach ($services_post as $post) : setup_postdata($post);
                            $id = get_the_ID();
                            $title = get_the_title();
                            if ($main_id == $id) {
                                $class_menu = 'class="selected"';
                            } else {
                                $class_menu = '';
                            }
                            ?>
                            <li <?php
                            if (is_archive || is_category()) {
                                
                            } else {
                                echo $class_menu;
                            }
                            ?>>
                                <a href="<?php echo get_permalink($id); ?>" title="<?php echo $title; ?>"><?php echo $title; ?></a></li>
                            <?php
                            $j++;
                        endforeach;
                        echo '</ul>';
                        ?>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        Categories
                    </button>
                </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <div class="cate_main">
                        <?php dynamic_sidebar('sidebar-2'); ?>
                        <script>
                            jQuery(".current-cat").addClass("selected");
                        </script>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                        Archive
                    </button>
                </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <div class="card-body">
                    <div class="archives_main">
                        <ul>
                            <li>
                                <div class="input-box">
                                    <div class="select_box">
                                        <span class="select_arrow"><i class="fa fa-caret-down"></i></span>
                                        <select name="archive-dropdown" onchange="document.location.href = this.options[this.selectedIndex].value;" class="input">
                                            <option value=""><?php echo esc_attr(__('Select Month')); ?></option>
                                            <?php add_filter("get_archives_link", "get_archives_link_mod"); ?>
                                            <?php wp_get_archives(array('type' => 'monthly', 'format' => 'option', 'show_post_count' => true)); ?>
                                        </select>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

</div>
