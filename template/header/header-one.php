<header class="site-header-one">
    <div class="container">

        <!-- Site Branding (e.g., Logo, Title, Description) -->
        <div class="site-branding-one">
            <?php
            if (has_custom_logo()) {
                the_custom_logo();
            } else {
                ?>
                <h1 class="site-title">
                    <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                        <?php bloginfo('name'); ?>
                    </a>
                </h1>
                <p class="site-description"><?php bloginfo('description'); ?></p>
                <?php
            }
            ?>
        </div>

        <!-- Navigation -->
        <nav class="site-navigation-one">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu', // Using a different menu location
                'menu_id'        => 'main_menu',
                'container'      => 'div',
                'container_class'=> 'menu-container-one',
                'menu_class'     => 'menu-one',
                'fallback_cb'    => false,
            ));
            ?>
        </nav>

        <!-- Optional Search Form -->
        <!-- <div class="search-form-container">
            <?php get_search_form();  ?>
        </div> -->

        <!-- Additional Section (Optional) -->
        <div class="extra-header-section">
            <!-- You can add extra content here, like social media links, call-to-action buttons, etc. -->
            <a href="#special-offer" class="special-offer-link">Special Offer</a>
        </div>

    </div>
</header>