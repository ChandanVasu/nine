<?php
/**
 * Template part for displaying single post (one)
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package nine-theme
 */



 get_header(); ?>

<?php
if ( have_posts() ) :
    while ( have_posts() ) : the_post(); 
        
        // Call the display_post_thumbnail function
        display_post_thumbnail();

        // Your existing template logic
        if ( has_post_format( 'video' ) ) : ?>
            <div class="post-format-video">
                <?php get_template_part( 'template-parts/content', 'video' ); ?>
            </div>

        <?php elseif ( has_post_format( 'gallery' ) ) : ?>
            <div class="post-format-gallery">
                <?php get_template_part( 'template-parts/content', 'gallery' ); ?>
            </div>

        <?php else : ?>
            <div class="post-format-standard">
                <?php get_template_part( 'template-parts/content', 'single' ); ?>
            </div>
        <?php endif;

    endwhile;
else :
    get_template_part( 'template-parts/content', 'none' );
endif;
?>

<?php get_footer(); ?>
