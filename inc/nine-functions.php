<?php

function display_archive_title() {
    if (is_category()) {
        $title = 'Category: ' . single_cat_title('', false);
    } elseif (is_tag()) {
        $title = 'Tag: ' . single_tag_title('', false);
    } elseif (is_author()) {
        the_post();
        $title = 'Author: ' . get_the_author();
        rewind_posts();
    } elseif (is_day()) {
        $title = 'Daily Archives: ' . get_the_date();
    } elseif (is_month()) {
        $title = 'Monthly Archives: ' . get_the_date('F Y');
    } elseif (is_year()) {
        $title = 'Yearly Archives: ' . get_the_date('Y');
    } elseif (is_search()) {
        $title = 'Search Results for: ' . get_search_query();
    } elseif (is_home()) {
        $title = 'Latest Posts';
    } else {
        $title = 'Archives:';
    }
    return $title;
}
