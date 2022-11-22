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
      
        <!-- 
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Dropdown
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
        </li> 
      </ul>
    -->

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
      

      <form class="d-flex">
      <?php get_search_form();?>
        <!-- <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"> -->
        
        <!-- <button class="btn btn-outline-success" type="submit">Search</button> -->
      </form>
    </div>
  </div>
</nav>
