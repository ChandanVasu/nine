<?php
/**
 * Custom display functions for the theme.
 *
 * @package nine
 */

function nine_post_tags() {
    $tags_list = get_the_tag_list('', '</li><li>', '');
    if ($tags_list) {
        echo '<ul class="post-tags"><li>' . wp_kses_post($tags_list) . '</li></ul>';
    }
}

function nine_theme_display_post_meta() {
    $author_id = get_the_author_meta('ID');
    $author_avatar = get_avatar($author_id, 32); // Change 32 to the desired avatar size
    $author_url = get_author_posts_url($author_id);

    $output = '<div class="post-meta">';
    $output .= '<span class="author-avatar">' . wp_kses_post($author_avatar) . '</span>';
    $output .= '<div class="post-meta-inner">';
    $output .= '<span class="author-name">' . esc_html__('Author:', 'nine') . ' <a href="' . esc_url($author_url) . '">' . esc_html(get_the_author()) . '</a></span>';
    $output .= '<span class="post-date">' . esc_html__('Updated:', 'nine') . ' ' . esc_html(get_the_date()) . '</span>';
    $output .= '</div></div>';

    return $output;
}

function custom_pagination($query = null) {
    if (!$query) {
        global $wp_query;
        $query = $wp_query;
    }

    if ($query->max_num_pages <= 1) {
        return;
    }

    $paginate_args = array(
        'current'   => max(1, get_query_var('paged'), get_query_var('page')),
        'total'     => $query->max_num_pages,
        'prev_next' => true,
        'prev_text' => __('&#9664;', 'nine'),
        'next_text' => __('&#9654;', 'nine'),
    );

    the_posts_pagination($paginate_args);
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

function nine_link_pages() {
    $args = array(
        'before'           => '<div class="page-links"><span class="page-link-text">' . esc_html__('More pages:', 'nine') . '</span>',
        'after'            => '</div>',
        'link_before'      => '<span class="page-link">',
        'link_after'       => '</span>',
        'next_or_number'   => 'number',
        'separator'        => '  ',
        'nextpagelink'     => esc_html__('Next', 'nine') . ' <i class="ts-icon ts-icon-angle-right"></i>',
        'previouspagelink' => '<i class="ts-icon ts-icon-angle-left"></i>' . esc_html__('Previous', 'nine'),
    );
    wp_link_pages($args);
}

/**
 * Display navigation to next/previous post when applicable.
 */
function custom_post_navigation() {
    // Get the previous and next post
    $previous_post = get_previous_post();
    $next_post = get_next_post();

    if (!$previous_post && !$next_post) {
        return; // If there are no adjacent posts, exit early.
    }
    ?>
    <nav class="single-post-nav" role="navigation">
        <div class="single-post-nav-link">
            <?php if ($previous_post) : ?>
                <div class="s-p-nav-previous">
                    <a href="<?php echo esc_url(get_permalink($previous_post->ID)); ?>" rel="prev">
                        <?php if (has_post_thumbnail($previous_post->ID)) : ?>
                            <div class="s-p-nav-thumbnail">
                                <?php echo get_the_post_thumbnail($previous_post->ID, 'thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        <span class="s-p-nav-title"><?php echo esc_html(get_the_title($previous_post->ID)); ?></span>
                    </a>
                </div>
            <?php endif; ?>
            
            <?php if ($next_post) : ?>
                <div class="s-p-nav-next">
                    <a href="<?php echo esc_url(get_permalink($next_post->ID)); ?>" rel="next">
                        <?php if (has_post_thumbnail($next_post->ID)) : ?>
                            <div class="s-p-nav-thumbnail">
                                <?php echo get_the_post_thumbnail($next_post->ID, 'thumbnail'); ?>
                            </div>
                        <?php endif; ?>
                        <span class="s-p-nav-title"><?php echo esc_html(get_the_title($next_post->ID)); ?></span>
                    </a>
                </div>
            <?php endif; ?>
        </div><!-- .nav-links-nine -->
    </nav><!-- .navigation-nine -->
    <?php
}
