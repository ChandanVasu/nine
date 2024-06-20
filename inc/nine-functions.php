<?php

/**
 * Display the archive title based on the archive type.
 *
 * @return string The archive title.
 */
function display_archive_title() {
    if (is_category()) {
        $title = sprintf(__('Category: %s', 'nine'), single_cat_title('', false));
    } elseif (is_tag()) {
        $title = sprintf(__('Tag: %s', 'nine'), single_tag_title('', false));
    } elseif (is_author()) {
        the_post();
        $title = sprintf(__('Author: %s', 'nine'), get_the_author());
        rewind_posts();
    } elseif (is_day()) {
        $title = sprintf(__('Daily Archives: %s', 'nine'), get_the_date());
    } elseif (is_month()) {
        $title = sprintf(__('Monthly Archives: %s', 'nine'), get_the_date('F Y'));
    } elseif (is_year()) {
        $title = sprintf(__('Yearly Archives: %s', 'nine'), get_the_date('Y'));
    } elseif (is_search()) {
        $title = sprintf(__('Search Results for: %s', 'nine'), get_search_query());
    } elseif (is_home()) {
        $title = __('Latest Posts', 'nine');
    } else {
        $title = __('Archives:', 'nine');
    }
    return $title;
}

/**
 * Enqueue the comment reply script if necessary.
 */
function nine_enqueue_comment_reply() {
    if (is_singular() && comments_open() && get_option('thread_comments') == 1) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'nine_enqueue_comment_reply');
