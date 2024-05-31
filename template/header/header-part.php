<!-- Desktop Menu -->
<!-- <nav class="nine-menu-main">
  <?php
  wp_nav_menu(array(
    'theme_location' => 'main_menu',
    'menu_id'        => 'nav-main',
    'container'      => 'div',
    'container_class'=> 'nav-main-container',
    'menu_class'     => 'nav-main',
    'fallback_cb'    => false,
  ));
  ?>
</nav> -->

<!-- Mobile Menu Icon -->
<div onclick="closeHamburger()" class="menu-icon"></div>


<!-- Mobile Menu -->
<div class="nine-menu-mobile">
  <div class='nine-menu-header'>
    <!-- Logo -->
    <div class="nine-menu-logo logo-image">
      <?php
      if (has_custom_logo()) {
        the_custom_logo();
      } else {
      ?>
        <h1 class="nine-menu-text-logo logo-text">
          <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
            <?php bloginfo('name'); ?>
          </a>
        </h1>
        <p class="nine-menu-text-description">
          <?php bloginfo('description'); ?>
        </p>
      <?php
      }
      ?>
    </div>
    <!-- Close Icon -->
    <div onclick="callHamburger()" class="close-icon"></div>
  </div>

  <!-- Mobile Menu -->
  <nav class="">
    <?php
    wp_nav_menu(array(
      'theme_location' => 'main_menu',
      'menu_id'        => 'mobile-nav-menu',
      'container'      => 'div',
      'container_class'=> 'mobile-nav-menu-container',
      'menu_class'     => 'mobile-nav-menu',
      'fallback_cb'    => false,
    ));
    ?>
  </nav>
</div>
