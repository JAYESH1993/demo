<?php

// Exit If Accessed Directly
if( !defined( 'ABSPATH' ) ) exit;


function digital_register_meta_boxes() {
    $post_types = get_post_types();
    foreach( $post_types as $post_type_name ) {
        $ignore_post_types  =   array('reply','topic', 'report', 'status', 'attachment', 'revision','nav_menu_item','acf-field-group', 'acf-field', 'wpcf7_contact_form', 'banner');
        if(in_array($post_type_name, $ignore_post_types))
          continue;
        $post_type_data = get_post_type_object( $post_type_name );

        $newfilter_post = $post_type_data->name;

        $post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'] ;
        $template_file = get_option( 'page_on_front' );
        if ($post_id != $template_file ){
           add_meta_box( 'demo_theme_prim-656656', __( 'Title Tag Display'), 'digital_my_display_callback', $newfilter_post, 'digital-title-top');
           }

    }


}
add_action( 'add_meta_boxes', 'digital_register_meta_boxes' );

function digital_my_display_callback( $post ){
    $values = get_post_custom( $post->ID );
            $format	=  get_post_meta( $post->ID, 'cms_title_digital', true );
            $format = $format ? $format : 'h1-tag';
    ?>
<p>
    <input type="radio" <?php checked( $format, 'h1-tag' ); ?> value="h1-tag" id="cms_title_digital-0" class="post-format" name="cms_title_digital"> <label for="post-format-0">H1 Tag</label>
	<input type="radio" value="span-tag" id="cms_title_digital-1" <?php checked( $format, 'span-tag' ); ?> class="post-format" name="cms_title_digital"> <label for="post-format-aside">Span Tag</label>
	<input type="radio" value="div-tag" id="cms_title_digital-2" class="post-format" <?php checked( $format, 'div-tag' ); ?> name="cms_title_digital"> <label for="post-format-image">Div Tag</label>
        </p>
    <?php
}

function digital_meta_box_save( $post_id ){
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
    if(isset($_POST['cms_title_digital'])) {
        update_post_meta( $post_id, 'cms_title_digital', $_POST['cms_title_digital']);
    }
    if( !current_user_can( 'edit_post' ) ) return;

}

add_action( 'save_post', 'digital_meta_box_save' );

function buddydev_create_new_metboax_context( $post ) {
	do_meta_boxes( null, 'digital-title-top', $post );
}
add_action( 'edit_form_after_title', 'buddydev_create_new_metboax_context' );
