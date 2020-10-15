<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

//function get_level($category, $level = 0)
//{
//    if ($category->category_parent == 0) {
//        return $level;
//    } else {
//        $level++;
//        $category = get_term($category->category_parent);
//        get_level($category, $level);
//    }
//
//}

function qt_custom_breadcrumbs() {

  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show

  //$delimiter = '<span class="delimiter"> / </span>'; // delimiter between crumbs

  $before_home = '<li>'; 

  $home = 'Home'; // text for the 'Home' link

  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show 

  $after_home = '</li>';

  

  $before = '<li class="active">'; // tag before the current crumb

   $after = '</li>'; // tag after the current crumb

 

  global $post;

  $homeLink = get_bloginfo('url');

if (is_home() || is_front_page()) {

	if ($showOnHome == 1) echo '<ol class="breadcrumb">'.$before_home.'<a title="'.$home.'" href="' . $homeLink . '">' . $home . '</a>' . $after_home . '</ol>';

	} else {

    echo '<ol class="breadcrumb">'.$before_home.'<a title="'.$home.'" href="' . $homeLink . '">' . $home . '</a> '. $after_home . ' ';

    if ( is_category() ) {

      $thisCat = get_category(get_query_var('cat'), false);

       if($thisCat->term_id=='755') {
         echo '<li><a href="' . get_category_link($thisCat->term_id) . '">' . $thisCat->name . '</a></li>';
       }else{
        echo '<li><a href="' . get_permalink(DEMO_BLOG_PAGE_ID) . '">' . get_the_title(DEMO_BLOG_PAGE_ID) . '</a></li>';
       }
      if ($thisCat->parent != 0) echo '<li><a href="' . get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' '). '</a></li>';
 
      echo $before . single_cat_title('', false) . $after;

 

    } elseif ( is_tax('tax_services') ) {
 $thisCat = get_queried_object();

       echo '<li><a href="' . get_permalink(DEMO_SERVICE_PAGE_ID) . '">' . get_the_title(DEMO_SERVICE_PAGE_ID) . '</a></li>';
       if ($thisCat->parent != 0){
           $flag = 0;
           for ($x = 0; $x <= 4; $x++) {
                if ($flag == 0){
                    $term = get_term( $thisCat->parent, $taxonomy );
                echo '<li><a href=' . get_term_link($term->term_id). '>'.$term->name.'</a></li>';
                    if ($term->parent == 0){
                        $flag = 1;
                    }
               }
             }
            // echo '<li><a href=' . get_term_link($thisCat->term_id). '>'.$thisCat->name.'</a></li>';
    }
        echo $before . single_term_title('', false) . $after;

 

    }elseif ( is_tax('tax_project') ) {
      $thisCat = get_queried_object();
       echo '<li><a href="' . get_permalink(DEMO_PROJECT_PAGE_ID) . '">' . get_the_title(DEMO_PROJECT_PAGE_ID) . '</a></li>';
       if ($thisCat->parent != 0){
           $flag = 0;
           for ($x = 0; $x <= 4; $x++) {
                if ($flag == 0){
                    $term = get_term( $thisCat->parent, $taxonomy );
                echo '<li><a href=' . get_term_link($term->term_id). '>'.$term->name.'</a></li>';
                    if ($term->parent == 0){
                        $flag = 1;
                    }
               }
             }
            // echo '<li><a href=' . get_term_link($thisCat->term_id). '>'.$thisCat->name.'</a></li>';
    }
        echo $before . single_term_title('', false) . $after;



    } elseif ( is_search() ) {

      echo $before . 'Search Page' . $after;

 

    } elseif ( is_day() ) {

      echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';

      echo '<a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';

      echo $before . get_the_time('d') . $after;

 

    } elseif ( is_month() ) {
   echo '<li><a href="' . get_permalink(DEMO_BLOG_PAGE_ID) . '">' . get_the_title(DEMO_BLOG_PAGE_ID) . '</a></li>';
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li>';

      echo $before . get_the_time('F') . $after;

 

    } elseif ( is_year() ) {
   echo '<li><a href="' . get_permalink(DEMO_BLOG_PAGE_ID) . '">' . get_the_title(DEMO_BLOG_PAGE_ID) . '</a></li>';
      echo $before . get_the_time('Y') . $after;

	  

    } elseif ( is_single() && !is_attachment() ) {

      if ( get_post_type() != 'post' ) {

        $post_type = get_post_type_object(get_post_type());

        $slug = $post_type->rewrite;

        echo '<li><a title="'.$post_type->labels->singular_name.'" href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>'.$after_home;

        if ($showCurrent == 1) echo  $before . strip_tags(get_the_title()) . $after;

      } else {

        $cat = get_the_category(); $cat = $cat[0];

        //$cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);

        //echo $cats;

        if ($showCurrent == 1) echo $before . get_the_title() . $after;

      }

 

    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {

      $post_type = get_post_type_object(get_post_type());

      echo $before . $post_type->labels->singular_name . $after;

 

    } elseif ( is_attachment() ) {

      $parent = get_post($post->post_parent);

      $cat = get_the_category($parent->ID); $cat = $cat[0];

      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');

      echo '<li><a title="'.$parent->post_title.'" href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';

      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;

 

    } elseif ( is_page() && !$post->post_parent ) {

      if ($showCurrent == 1) echo $before . get_the_title() . $after;

 

    } elseif ( is_page() && $post->post_parent ) {

      $parent_id  = $post->post_parent;

      $breadcrumbs = array();

      while ($parent_id) {

        $page = get_page($parent_id);

        $breadcrumbs[] = '<li><a title="'.get_the_title($page->ID).'" href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';

        $parent_id  = $page->post_parent;

      }

      $breadcrumbs = array_reverse($breadcrumbs);

      for ($i = 0; $i < count($breadcrumbs); $i++) {

        echo $breadcrumbs[$i];

        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';

      }

      if ($showCurrent == 1) echo ' ' . $before . get_the_title() . $after;

    } elseif ( is_tag() ) {
echo '<li><a href="' . get_permalink(DEMO_BLOG_PAGE_ID) . '">' . get_the_title(DEMO_BLOG_PAGE_ID) . '</a></li>';
      echo $before . single_tag_title('', false) . $after;

    } 

	elseif ( is_author() ) {

       global $author;

      $userdata = get_userdata($author);

      echo $before . $userdata->display_name . $after;
    } elseif ( is_404() ) {

      echo $before . 'Page Not Found' . $after;

    }

   /* if ( get_query_var('paged') ) {

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';

      echo __('Page') . ' ' . get_query_var('paged');

      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';

    }*/

    echo '</ol>';
  }

} // end qt_custom_breadcrumbs()
?>
