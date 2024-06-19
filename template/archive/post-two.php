<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

        <div class='box-cont-nine'>

            <div>
                <div class="archive-page-header">
                    <h1 class="archive-page-title">
                        <?php echo display_archive_title(); ?>
                    </h1>
                </div>

                <div class="post-grid-container">
                    <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                    <div id="post-<?php the_ID(); ?>" <?php post_class('post-box'); ?>>
                        <div class="post-thumbnail thumbnail">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_post_thumbnail(); ?>
                            </a>
                            <span class="post-category">
                                <?php the_category(', '); ?>
                            </span>
                        </div>
                        <h2 class="post-title title">
                            <a href="<?php the_permalink(); ?>">
                                <?php echo wp_trim_words(get_the_title(), 10, '...'); ?>
                            </a>
                        </h2>
                        <div class="post-excerpt excerpt">
                            <?php echo wp_trim_words(get_the_content(), 20, '...'); ?>
                        </div>
                        <div class="post-meta-box">
                            <?php
                            $author_id = get_the_author_meta('ID');
                            $author_avatar = get_avatar_url($author_id, ['size' => 32]);
                            ?>
                            <img class="post-avatar author-avatar" src="<?php echo esc_url($author_avatar); ?>"
                                alt="<?php echo esc_attr(get_the_author()); ?>">
                            <a class="post-author-name" href="<?php echo esc_url(get_author_posts_url($author_id)); ?>">
                                <?php the_author(); ?>
                            </a>
                            <span class="post-date">
                                <?php echo human_time_diff(get_the_time('U'), current_time('timestamp')) . ' ago'; ?>
                            </span>
                        </div>
                    </div>
                    <?php endwhile; ?>
                    <?php else : ?>
                    <p>
                        <?php esc_html_e('No posts found.', 'text-domain'); ?>
                    </p>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>

                <div class="pagination">
                    <?php custom_pagination(); ?>
                </div>
            </div>
            <aside class='nine-sidebar'>

                <?php get_sidebar(); ?>


            </aside>
        </div>



    </main><!-- .site-main -->
</div><!-- .content-area -->