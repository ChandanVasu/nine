<?php
/**
 * Custom display functions for the theme.
 *
 * @package nine-theme
 */

function nine_post_tags() {
    $tags_list = get_the_tag_list('', '</li><li>', '');
    if ($tags_list) {
        echo '<ul class="post-tags"> <li>' . $tags_list . '</li></ul>';
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




