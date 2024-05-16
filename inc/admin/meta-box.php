<?php

function custom_metabox_example() {
    $prefix = 'custom_metabox_';

    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => __( 'Custom Metabox', 'nine-theme' ),
        'object_types' => array( 'post' ), // Post type(s) where the metabox will be displayed
    ) );

    // Add fields to the metabox
    $cmb->add_field( array(
        'name' => __( 'Field 1', 'nine-theme' ),
        'id'   => $prefix . 'field1',
        'type' => 'text',
    ) );


    // Add more fields as needed
}
add_action( 'cmb2_admin_init', 'custom_metabox_example' );


function km_disable_cmb2_front_end_styles( $enabled ) {

	if ( ! is_admin() ) {
		$enabled = false;
	}

	return $enabled;
}
add_filter( 'cmb2_enqueue_css', 'km_disable_cmb2_front_end_styles' );