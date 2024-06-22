
<div onclick="closeHamburger()" class="nine-solid vt-menu"></div>


<!-- Mobile Menu -->
<div class='theme-menu'>
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
    <div onclick="callHamburger()" class="nine-solid vt-close"></div>
  </div>

  <!-- Mobile Menu -->
  <nav class="mobile-nav-menu">
    <?php
   nine_menu()
    ?>
  </nav>
</div>
</div>
