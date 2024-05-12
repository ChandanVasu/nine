
<div class='main-home'>

    <div class='main-home-content'>

        <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>

         <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>


        <div class="main-home-content-post " >

            <?php if (has_post_thumbnail()) : ?>
            <div class="main-home-content-post-thumbnail thumbnail">
                <a href="<?php the_permalink(); ?>">
                    <?php the_post_thumbnail('', array('title' => get_the_title())); ?>
                </a>
            </div>
            <?php endif; ?>

            <div class='main-home-content-post-meta'>
                <h2 class="main-home-content-title title"><a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a></h2>

                <div class="main-home-content-excerpt excerpt">
                    <?php echo wp_trim_words(get_the_content(), 30); ?>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                    <!-- Added Read More button -->
                </div>
            </div>


            <div class='main-home-content-post-footer'>

                <div class="main-home-content-post-meta">
                    <div class='author-and-date'>

                        <div class="author-avatar">
                            <a target="_blank"
                                href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                <?php echo get_avatar(get_the_author_meta('user_email'), 45); ?>
                            </a>
                        </div>

                        <div class="author-name-and-date">
                            <span> author: <a
                                    href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                    <?php echo esc_html(get_the_author()); ?>
                                </a></span>
                            <span>
                                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                            </span>
                        </div>

                    </div>
                </div>

                <div>
                </div>

            </div> <!-- Closing main-home-content-post-footer -->


        </div>

            </div>

        <?php endwhile; ?>
        <?php endif; ?>

        <?php
    
    // Pagination
    global $wp_query;
    if ($wp_query->max_num_pages > 1) :
    ?>
        <nav class="pagination">
            <?php
            $paginate_args = array(
                'current'   => max(1, get_query_var('paged'), get_query_var('page')),
                'total'     => $wp_query->max_num_pages,
                'prev_next' => true,
                'prev_text' => __('&#9664;', 'nine-theme'), // Unicode for left arrow icon
                'next_text' => __('&#9654;', 'nine-theme'), // Unicode for right arrow icon
            );

            echo paginate_links($paginate_args);
            ?>
        </nav>
        <?php endif; ?>

    </div>

    <div class='main-home-sidebar'>

        <?php get_sidebar(); ?>

    </div>

</div>

