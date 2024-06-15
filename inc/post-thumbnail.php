<?php
/**
 * Custom display functions for the theme.
 *
 * @package nine-theme
 */

/**
 * Display the post thumbnail based on the post format.
 */
function display_post_thumbnail() {
    if ( has_post_format( 'video' ) ) {
        display_video_thumbnail();
    } elseif ( has_post_format( 'gallery' ) ) {
        display_gallery_thumbnail();
    } else {
        display_standard_thumbnail();
    }
}

/**
 * Display the video thumbnail.
 */
function display_video_thumbnail() {
    $video_url = get_post_meta( get_the_ID(), 'custom_metabox_video_url', true );

    if ( ! empty( $video_url ) ) {
        $embed_url = get_embed_url( $video_url );

        if ( empty( $embed_url ) ) {
            display_html5_video( $video_url );
        } else {
            display_youtube_video( $embed_url );
        }
    }
}

/**
 * Get the embed URL for YouTube videos.
 *
 * @param string $video_url The video URL.
 * @return string The embed URL.
 */
function get_embed_url( $video_url ) {
    $embed_url = '';

    if ( strpos( $video_url, 'youtube.com/watch' ) !== false ) {
        parse_str( parse_url( $video_url, PHP_URL_QUERY ), $url_params );
        $video_id = $url_params['v'];
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
    } elseif ( strpos( $video_url, 'youtu.be' ) !== false ) {
        $video_id = substr( parse_url( $video_url, PHP_URL_PATH ), 1 );
        $embed_url = 'https://www.youtube.com/embed/' . $video_id;
    }

    return $embed_url;
}

/**
 * Display an HTML5 video.
 *
 * @param string $video_url The video URL.
 */
function display_html5_video( $video_url ) {
    $thumbnail_url = has_post_thumbnail() ? get_the_post_thumbnail_url() : '';

    echo '<div class="post-format-video">';
    echo '<video controls autoplay crossorigin playsinline poster="' . esc_url( $thumbnail_url ) . '">';
    echo '<source src="' . esc_url( $video_url ) . '" type="video/mp4">';
    echo 'Your browser does not support the video tag.';
    echo '</video>';
    echo '</div>';
}

/**
 * Display a YouTube video.
 *
 * @param string $embed_url The embed URL.
 */
function display_youtube_video( $embed_url ) {
    echo '<div class="post-format-video-thumbnail">';
    echo '<div class="video-container">';
    echo '<iframe src="' . esc_url( $embed_url ) . '" frameborder="0" allowfullscreen></iframe>';
    echo '</div>';
    echo '</div>';
}

/**
 * Display the gallery thumbnail.
 */
function display_gallery_thumbnail() {
    $gallery_images = get_post_meta( get_the_ID(), 'custom_metabox_gallery', true );

    if ( ! empty( $gallery_images ) ) {
        echo '<div class="post-format-gallery-thumbnail">';
        echo '<ul>';
        foreach ( $gallery_images as $image_url ) {
            echo '<li><img src="' . esc_url( $image_url ) . '" alt=""></li>';
        }
        echo '</ul>';
        echo '<div class="gallery-dots">';
        foreach ( $gallery_images as $index => $image_url ) {
            echo '<span class="dot" data-index="' . $index . '"></span>';
        }
        echo '</div>';
        echo '</div>';
    }
}

/**
 * Display the standard thumbnail.
 */
function display_standard_thumbnail() {
    if ( has_post_thumbnail() ) {
        echo '<div class="post-format-image-thumbnail">';
        the_post_thumbnail();
        echo '</div>';
    }
}
