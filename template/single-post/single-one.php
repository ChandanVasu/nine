<div class='single-one-post'>

    <div class="single-one-post-content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail thumbnail">
                        <?php the_post_thumbnail(); ?>

                        <div class='single-one-post-thumbnail-inner'>

                            <span class="category">
                                <?php the_category(', '); ?>
                            </span>
                            <h1 class='single-one-post-title'>
                                <?php the_title(); ?>
                            </h1>
                            <div class="post-meta">
                                <?php
                                $author_id = get_the_author_meta('ID');
                                $author_avatar = get_avatar($author_id, 32); // Change 32 to the desired avatar size
                                ?>
                                <span class="author-avatar">
                                    <?php echo $author_avatar; ?>
                                </span>

                                <div class='post-meta-inner'>
                                    <span class="author-name">
                                        <?php the_author(); ?>
                                    </span>
                                    <span class="post-date">
                                        <?php echo get_the_date(); ?>
                                    </span>
                                </div>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="post-content">
                    <?php the_content(); ?>
                </div>

                <!-- Display Comments -->
                <div class="comments-section">
                    <?php comments_template(); ?>
                </div>

        <?php endwhile;
        endif; ?>
    </div>

    <div class="single-one-post-sidebar">
        <?php get_sidebar(); ?>
    </div>

</div>