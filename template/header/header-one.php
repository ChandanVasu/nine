<div class='site-main'>
    <header class="nine-h-1">
        <!-- Site Branding (e.g., Logo, Title, Description) -->
        <div class="nine-h-1-logo logo-image">
            <?php if (has_custom_logo()) : ?>
                <?php the_custom_logo(); ?>
            <?php else : ?>
                <h1 class="nine-h-1-text-logo logo-text">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <p class="nine-h-1-text-description">
                    <?php bloginfo('description'); ?>
                </p>
            <?php endif; ?>
        </div>

        <div class='nine-h-1-menu'>
            <div class='nine-h-1-main-desk'>
                <?php nine_menu(); ?>
            </div>
            <div>
                <?php get_template_part('template/header/header-part'); ?>
            </div>
        </div>
    </header>
</div>

<div class='offcanvas-full'></div>
