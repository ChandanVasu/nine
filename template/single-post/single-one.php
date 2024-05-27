<?php
/**
 * Template part for displaying single posts
 *
 * @package nine_theme
 */
?>

<div class='s-1'>
    <div class='s-1-post'>
        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <div class='s-1-header'>
                <h1 class='s-1-title title'>
                    <?php the_title(); ?>
                </h1>
                
            </div>
            <div class='s-1-thumbnail thumbnail'>
                <?php display_post_thumbnail(); ?>
            </div>
            <div class="post-content">
                <?php the_content(); ?>
            </div>
        </article>

        <div class='s-1-tags'>
            <?php nine_post_tags(); ?>
        </div>

        <div class='s-1-comment'>
            <?php
            if (comments_open() || get_comments_number()) :
                comments_template();
            endif;
            ?>
        </div>
    </div>

    <div class='s-1-sidebar'>
        <?php get_sidebar(); ?>
    </div>
</div>
