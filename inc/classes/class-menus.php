<?php

/**
 * Navbar menu registration
 * 
 * @package Aquilia
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

 class Menus {
    use Singleton;

    protected function __construct()
    {
        // Load class
        $this-> setup_hooks();
    }
    protected function setup_hooks(){
        // Action
        add_action('init', [$this , 'register_menus']);
    }

    public function register_menus(){
        register_nav_menus([
            'aquilia_primary_menu' => esc_html__('Primary Menu', 'aquilia'),
            'aquilia_footer_menu' => esc_html__('Footer Menu', 'aquilia'),
        ]);
    }

    public function get_menu_id($location){
        // Get all the location.

        $locations = get_nav_menu_locations();
        

         // Get object id by location
         $menu_id = $locations[$location];

         return ! empty($menu_id)? $menu_id : " " ;
    }
 }