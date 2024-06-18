<div id="primary" class="content-area">
<main id="main" class="site-main" role="main">
    <div class='s-1'>
    <div class='s-1-post'>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class='s-1-header'>
                <h1 class='s-1-title title'>
                    <?php the_title(); // Display the post title ?>
                </h1>
                <div class='s-1-excerpt excerpt'>
                    <?php 
                    // Check if the post has an excerpt
                    if (has_excerpt()) {
                        the_excerpt(); // Display the post excerpt
                    } 
                    ?>
                </div>
                    <div class='s-1-post-meta'>
                    <?php echo nine_theme_display_post_meta(); ?>

                    <?php social_media_share_one(); ?>
                    </div>

            </div>
            
            <div class='s-1-thumbnail'>
                <?php display_post_thumbnail(); // Display the post thumbnail ?>
            </div>
            <div class="post-content">
                <?php the_content(); // Display the full post content ?>
            </div>
        </article>

        <div class='s-1-tags'>
            <?php nine_post_tags(); // Display post tags ?>
        </div>

        <div class='s-1-comment'>
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template(); // Load the comments template if comments are open or there are comments
            endif;
            ?>
        </div>

        <!-- Call the social media share buttons function here -->
    </div>

    <div class='s-1-sidebar'>
        <?php get_sidebar(); // Load the sidebar ?>
    </div>
    </div>
</main><!-- .site-main -->
</div><!-- .content-area -->
