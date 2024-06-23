<?php 
/**
 * Index
 * @package nine
 */
?>

<div class='h-1'>

    <div class='h-1-content'>

        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>

                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

                    <div class="h-1-box nine-box">

                        <?php if (has_post_thumbnail()) : ?>
                            <div class="h-1-thumbnail thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('', array('title' => get_the_title())); ?>
                                </a>
                                <span class='h-1-categories'>
                                    <?php display_post_categories() ?>
                                </span>
                            </div>
                        <?php endif; ?>

                        <div class='h-1-title-excerpt'>
                            <h2 class="main-home-content-title title">
                                <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                            </h2>

                            <div class="h-1-excerpt excerpt nine-excerpt">
                                <?php echo wp_trim_words(get_the_content(), 20); ?>
                                <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                                <!-- Added Read More button -->
                            </div>
                        </div>
                        <div class="h-1-footer">
                            <div class='author-and-date'>

                                <div class="author-avatar">
                                    <a target="_blank" href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                        <?php echo get_avatar(get_the_author_meta('user_email'), 45); ?>
                                    </a>
                                </div>

                                <div class="author-name-and-date">
                                    <span class="author-name">
                                        author: <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>">
                                            <?php echo esc_html(get_the_author()); ?>
                                        </a>
                                    </span>
                                    <span class="post-date">
                                        <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                                    </span>
                                </div>

                            </div>
                        </div>

                    </div> <!-- Closing main-home-content-post -->

                </div> <!-- Closing post-<?php the_ID(); ?> -->

            <?php endwhile; ?>
        <?php endif; ?>

        <div class='pagination'>

            <?php custom_pagination() ?>

        </div>

    </div> <!-- Closing main-home-content -->

    <aside class='h-1-sidebar'>
        <?php get_sidebar(); ?>
    </aside>

</div> <!-- Closing main-home -->
