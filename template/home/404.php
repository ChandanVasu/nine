<?php 
/**
 * 404
 * @package nine
 */
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <section class="error-404 not-found">
            <header class="page-header">
                <h1 class="page-title"><?php _e( 'Oops! That page can’t be found.', 'nine' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content">
                <p><?php _e( 'It looks like nothing was found at this location. Maybe try one of the links below or a search?', 'nine' ); ?></p>
                
                <?php get_search_form(); ?>
                
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- .site-main -->
</div><!-- .content-area -->

