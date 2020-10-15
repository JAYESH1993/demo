<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;

/*
 * pagination custon
 */

function wpbeginner_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;

	$max   = intval( $wp_query->max_num_pages );
	/**	Add current page to the array */

	if ( $paged >= 1 )

		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {

		$links[] = $paged - 1;

		$links[] = $paged - 2;

	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;

		$links[] = $paged + 1;

	}

	echo '<div class="my_pagination"><ul class="pagination flex justify-content-center">' . "\n";

$class = $paged == $max ? ' class="pageNext"' : '';

	if ( 1 != $paged ) {

		printf( '<li><a href="%s" aria-label="Previous"></a></li>' . "\n", esc_url( get_pagenum_link( $paged - 1 ) ) );

	}else {
		printf( '<li class="disabled"><a href="%s" aria-label="Previous"></a></li>' . "\n", 'javascript:void(0)' );
	}
	/**	Previous Post Link */

	if ( get_previous_posts_link() )

		//printf( '<li>%s</li>' . "\n", get_previous_posts_link() );
	/**	Link to first page, plus ellipses if necessary */

	if ( ! in_array( 1, $links ) ) {

		$class = 1 == $paged ? ' class="selected"' : '';
		printf( '<li %s ><a href="%s" >%s</a></li>' . "\n",$class , esc_url( get_pagenum_link( 1 ) ),  '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li><span class="page-numbers">…</span></li>';
	}
	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="selected"' : '';
		printf( '<li %s ><a href="%s" >%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}
	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li><span class="page-numbers">…</span></li>' . "\n";
		$class = $paged == $max ? ' class="selected"' : '';
		printf( '<li %s ><a href="%s" >%s</a></li>' . "\n",$class, esc_url( get_pagenum_link( $max ) ), $max );
	}
	/**	Next Post Link */
	//if ( get_next_posts_link() )
		///printf( '<li>%s</li>' . "\n", get_next_posts_link() );
if ( $paged != $max ) {
		printf( '<li><a href="%s" aria-label="Next"></a></li>' . "\n", esc_url( get_pagenum_link( $paged + 1 ) ) );
	}else {
		printf( '<li class="disabled"><a href="%s" aria-label="Next"></a></li>' . "\n", 'javascript:void(0)' );
	}
	echo '</ul></div>' . "\n";
	//echo '<div class="NextPrev">' . "\n";
	//}
	echo '' . "\n";
	//<div class="NextPrev">               <a href="#" class="pagePrev"> &nbsp;</a>                <a href="#" class="pageNext"> &nbsp;</a>                <div class="clear"></div>            </div>

}
/*================ page navi =============*/

function paginate_links_cust( $args = '' ) {
    global $wp_query, $wp_rewrite;

    // Setting up default values based on the current URL.
    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $url_parts    = explode( '?', $pagenum_link );

    // Get max pages and current page out of the current query, if available.
    $total   = isset( $wp_query->max_num_pages ) ? $wp_query->max_num_pages : 1;
    $current = get_query_var( 'paged' ) ? intval( get_query_var( 'paged' ) ) : 1;

    // Append the format placeholder to the base URL.
    $pagenum_link = trailingslashit( $url_parts[0] ) . '%_%';

    // URL base depends on permalink settings.
    $format  = $wp_rewrite->using_index_permalinks() && ! strpos( $pagenum_link, 'index.php' ) ? 'index.php/' : '';
    $format .= $wp_rewrite->using_permalinks() ? user_trailingslashit( $wp_rewrite->pagination_base . '/%#%', 'paged' ) : '?paged=%#%';

    $defaults = array(
        'base' => $pagenum_link, // http://example.com/all_posts.php%_% : %_% is replaced by format (below)
        'format' => $format, // ?page=%#% : %#% is replaced by the page number
        'total' => $total,
        'current' => $current,
        'show_all' => false,
        'prev_next' => true,
        'prev_text' => __('&laquo;'),
        'next_text' => __('&raquo;'),
        'end_size' => 1,
        'mid_size' => 2,
        'type' => 'plain',
        'add_args' => array(), // array of query args to add
        'add_fragment' => '',
        'before_page_number' => '',
        'after_page_number' => ''
    );

    $args = wp_parse_args( $args, $defaults );

    if ( ! is_array( $args['add_args'] ) ) {
        $args['add_args'] = array();
    }

    // Merge additional query vars found in the original URL into 'add_args' array.
    if ( isset( $url_parts[1] ) ) {
        // Find the format argument.
        $format = explode( '?', str_replace( '%_%', $args['format'], $args['base'] ) );
        $format_query = isset( $format[1] ) ? $format[1] : '';
        wp_parse_str( $format_query, $format_args );

        // Find the query args of the requested URL.
        wp_parse_str( $url_parts[1], $url_query_args );

        // Remove the format argument from the array of query arguments, to avoid overwriting custom format.
        foreach ( $format_args as $format_arg => $format_arg_value ) {
            unset( $url_query_args[ $format_arg ] );
        }

        $args['add_args'] = array_merge( $args['add_args'], urlencode_deep( $url_query_args ) );
    }

    // Who knows what else people pass in $args
    $total = (int) $args['total'];
    if ( $total < 2 ) {
        return;
    }
    $current  = (int) $args['current'];
    $end_size = (int) $args['end_size']; // Out of bounds?  Make it the default.
    if ( $end_size < 1 ) {
        $end_size = 1;
    }
    $mid_size = (int) $args['mid_size'];
    if ( $mid_size < 0 ) {
        $mid_size = 2;
    }
    $add_args = $args['add_args'];
    $r = '';
    $page_links = array();
    $dots = false;
	 $page_links[]='<div class="my_pagination"><ul class="pagination flex justify-content-center">';

    if ( $args['prev_next'] && $current && 1 < $current ) :
        $link = str_replace( '%_%', 2 == $current ? '' : $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current - 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /**
         * Filter the paginated links for the given archive pages.
         *
         * @since 3.0.0
         *
         * @param string $link The paginated link URL.
         */
        $page_links[] = '<li class="prev"><a class="prev" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '"></a></li>';

		else :
		$page_links[] = '<li class="disabled prev"><a class="prev" href="javascript:void(0)"></a></li>';


    endif;

    for ( $n = 1; $n <= $total; $n++ ) :
        if ( $n == $current ) :
            $page_links[] = "<li class='selected'><a href=''>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "<span class='sr-only'>(current)</span></a></li>";
            $dots = true;
        else :
            if ( $args['show_all'] || ( $n <= $end_size || ( $current && $n >= $current - $mid_size && $n <= $current + $mid_size ) || $n > $total - $end_size ) ) :
                $link = str_replace( '%_%', 1 == $n ? '' : $args['format'], $args['base'] );
                $link = str_replace( '%#%', $n, $link );
                if ( $add_args )
                    $link = add_query_arg( $add_args, $link );
                $link .= $args['add_fragment'];

                /** This filter is documented in wp-includes/general-template.php */
                $page_links[] = "<li><a class='page-numbers' href='" . esc_url( apply_filters( 'paginate_links', $link ) ) . "'>" . $args['before_page_number'] . number_format_i18n( $n ) . $args['after_page_number'] . "</a></li>";
                $dots = true;
            elseif ( $dots && ! $args['show_all'] ) :
                $page_links[] = '<li><span class="page-numbers dots">' . __( '&hellip;' ) . '</span></li>';
                $dots = false;
            endif;
        endif;
    endfor;
    if ( $args['prev_next'] && $current && ( $current < $total || -1 == $total ) ) :
        $link = str_replace( '%_%', $args['format'], $args['base'] );
        $link = str_replace( '%#%', $current + 1, $link );
        if ( $add_args )
            $link = add_query_arg( $add_args, $link );
        $link .= $args['add_fragment'];

        /** This filter is documented in wp-includes/general-template.php */
        $page_links[] = '<li class="next"><a class="next" href="' . esc_url( apply_filters( 'paginate_links', $link ) ) . '"></a></li>';
		else :
		$page_links[] = '<li class="disabled next"><a class="next" href="javascript:void(0)"></a></li>';
    endif;
	$page_links[]='</ul></div>';
    switch ( $args['type'] ) {
        case 'array' :
            return $page_links;

        case 'list' :
            $r .= "<ul class='page-numbers'>\n\t<li>";
            $r .= join("</li>\n\t<li>", $page_links);
            $r .= "</li>\n</ul>\n";
            break;

        default :
            $r = join("\n", $page_links);
            break;
    }
    return $r;
}
