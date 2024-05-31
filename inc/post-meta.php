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



function nine_theme_display_post_meta() {
    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar($author_id, 32); // Change 32 to the desired avatar size
    $author_url = get_author_posts_url($author_id);

    $output = '<div class="post-meta">';
    $output .= '<span class="author-avatar">' . wp_kses_post($author_avatar) . '</span>';
    $output .= '<div class="post-meta-inner">';
    $output .= '<span class="author-name">author: <a href="' . esc_url($author_url) . '">' . get_the_author() . '</a></span>';
    $output .= '<span class="post-date">update: ' . get_the_date() . '</span>';
    $output .= '</div></div>';

    return $output;
}


function nine_menu() {
    $menu_name = 'main_menu'; // Replace with your actual theme location name
    $menu_locations = get_nav_menu_locations();
    
    // Check if the menu location has a menu assigned to it
    if (isset($menu_locations[$menu_name])) {
        $menu = wp_get_nav_menu_object($menu_locations[$menu_name]);
        $menu_items = wp_get_nav_menu_items($menu->term_id);

        if ($menu_items && !empty($menu_items)) {
            // If menu has items, display it
            wp_nav_menu(array(
                'theme_location' => $menu_name,
                'menu_id'        => 'nav-main',
                'container'      => 'div',
                'container_class'=> 'nav-main-container',
                'menu_class'     => 'nav-main',
                'fallback_cb'    => false,
            ));
        } else {
            // If menu is empty, display message or link
            echo '<div class="nav-main-container">';
            echo '<p>No menu items found. <a href="' . admin_url('nav-menus.php?action=edit&menu=0') . '">Create a menu</a>.</p>';
            echo '</div>';
        }
    } else {
        // If no menu is set for the location, display message or link
        echo '<div class="nav-main-container">';
        echo '<p>No menu assigned to this location. <a href="' . admin_url('nav-menus.php?action=edit&menu=0') . '">Create a menu</a>.</p>';
        echo '</div>';
    }
}



function custom_pagination($query = null) {
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    if ($query->max_num_pages <= 1) return;

    $paginate_args = array(
        'current'   => max(1, get_query_var('paged'), get_query_var('page')),
        'total'     => $query->max_num_pages,
        'prev_next' => true,
        'prev_text' => __('&#9664;', 'nine-theme'),
        'next_text' => __('&#9654;', 'nine-theme'),
    );

    echo paginate_links($paginate_args);
}




function display_post_categories() {
    $categories = get_the_category();
    if (!empty($categories)) {
        ?>
        <div class="nine-categories">
            <?php foreach ($categories as $category) : ?>
                <a href="<?php echo esc_url(get_category_link($category->term_id)); ?>">
                    <?php echo esc_html($category->name); ?>
                </a>
                <?php if (end($categories) !== $category) echo ', '; ?>
            <?php endforeach; ?>
        </div>
        <?php
    }
}
