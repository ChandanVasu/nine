<div class='site-main'>
    <header class="nine-h-1">

        <!-- Site Branding (e.g., Logo, Title, Description) -->
        <div class="nine-h-1-logo logo-image">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
            <h1 class="nine-h-1-text-logo logo-text">
                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                    <?php bloginfo('name'); ?>
                </a>
            </h1>
            <p class="nine-h-1-text-description">
                <?php bloginfo('description'); ?>
            </p>
            <?php
            }
            ?>
        </div>

        <!-- Navigation -->
        <nav class="nine-h-1-menu">
            <?php my_custom_navigation(); ?>
        </nav>

        <div class='nine-h-1-search'>
            <?php get_search_form(); ?>
        </div>

        <div class='social-media'>
            <div class='facebook'></div>
            <div class='insta'></div>
            <div class='x'></div>
        </div>


    </header>
</div>