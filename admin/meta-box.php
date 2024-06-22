<?php

function custom_metabox_example() {
    $prefix = 'custom_metabox_';

    $cmb = new_cmb2_box( array(
        'id'           => $prefix . 'metabox',
        'title'        => __( 'Custom Metabox', 'nine' ),
        'object_types' => array( 'post' ), // Post type(s) where the metabox will be displayed
    ) );


    // Add a field for the video URL
    $cmb->add_field( array(
        'name' => __( 'Video URL', 'nine' ),
        'desc' => __( 'Enter the URL for the video', 'nine' ),
        'id'   => $prefix . 'video_url',
        'type' => 'text_url',
    ) );

    // Add a field for the gallery images
    $cmb->add_field( array(
        'name' => __( 'Gallery Images', 'nine' ),
        'desc' => __( 'Upload or add multiple images for the gallery', 'nine' ),
        'id'   => $prefix . 'gallery',
        'type' => 'file_list',
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
