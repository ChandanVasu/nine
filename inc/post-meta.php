<?php
/**
 * Custom display functions for the theme.
 *
 * @package nine-theme
 */

function display_post_thumbnail() {
    if ( has_post_format( 'video' ) ) {        
        // Get and display the video URL
        $video_url = get_post_meta( get_the_ID(), 'custom_metabox_video_url', true );
        if ( !empty($video_url) ) {
            // Convert regular YouTube URL to embed URL if necessary
            if (strpos($video_url, 'youtube.com/watch') !== false) {
                parse_str(parse_url($video_url, PHP_URL_QUERY), $url_params);
                $video_id = $url_params['v'];
                $embed_url = 'https://www.youtube.com/embed/' . $video_id;
            } elseif (strpos($video_url, 'youtu.be') !== false) {
                $video_id = substr(parse_url($video_url, PHP_URL_PATH), 1);
                $embed_url = 'https://www.youtube.com/embed/' . $video_id;
            } else {
                $embed_url = $video_url; // Default to the provided URL if it's already an embed URL
            }

            echo '<div class="post-format-video-thumbnail">';
            echo '<div class="video-container">';
            echo '<iframe src="' . esc_url($embed_url) . '" frameborder="0" allowfullscreen></iframe>';
            echo '</div>';
            echo '</div>';
        }
        
    } elseif ( has_post_format( 'gallery' ) ) {        
        // Get and display the gallery images
        $gallery_images = get_post_meta( get_the_ID(), 'custom_metabox_gallery', true );
        if ( !empty($gallery_images) ) {
            echo '<div class="post-format-gallery-thumbnail">';
            echo '<ul>';
            foreach ( $gallery_images as $image_id => $image_url ) {
                echo '<li><img src="' . esc_url($image_url) . '" alt=""></li>';
            }
            echo '</ul>';
            echo '</div>';
        }
        
    } else {
        if ( has_post_thumbnail() ) {
            echo '<div class="post-format-image-thumbnail">';
            the_post_thumbnail();
            echo '</div>';
        }
    }
}

// Function to display post tags
function nine_post_tags() {
    $tags_list = get_the_tag_list('', '</li><li>', '');
    if ($tags_list) {
        echo '<ul class="post-tags"><li>' . $tags_list . '</li></ul>';
    }
}





