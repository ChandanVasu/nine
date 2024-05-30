<?php
/**
 * The template for displaying all pages
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Nine
 */

get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">

        <?php
        // Start the loop.
        while ( have_posts() ) : the_post();
            get_template_part( 'template/page/page', 'one' );
        endwhile;
        ?>

        </main><!-- .site-main -->
    </div><!-- .content-area -->

<?php get_footer(); ?>
