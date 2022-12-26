<?php
/**
 * Navigation Templlate
 * @package Aquilia
 */

use AQUILIA_THEME\Inc\Menus;

 $menu_class = Menus::get_instance();

 $header_menu_id = $menu_class->get_menu_id('aquilia_primary_menu');

 $header_menus = wp_get_nav_menu_items($header_menu_id);


?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <?php 
    if( function_exists('the_custom_logo')){
      the_custom_logo();
    }
    else{ ?>
    <a class="navbar-brand" href="#">Navbar</a>

   <?php }
    ?>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <?php
        wp_nav_menu([
          'theme_location' => 'aquilia_primary_menu',
          'container_class' => 'ms-auto',
          'menu_class' => 'navbar-nav me-auto mb-2 mb-lg-0',
          'falback-to'=> false,
          'items_wrap' => '<ul id="%1$s" class="navbar-nav me-auto mb-2 mb-md-0 %2$s">%3$s</ul>',
          'depth' => 2,
          'walker' => new bootstrap_5_wp_nav_menu_walker(),
          ]
        );
      ?>     
      <?php get_search_form();?>      
    </div>
  </div>
</nav>
