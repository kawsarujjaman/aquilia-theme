<?php

/**
 * 
 * Theme Sidebar
 * Register Sidebar
 * 
 * @package Aquilia
 * 
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

class Assets {
    use Singleton;

    protected function __construct()
    {
        // Load Class
        $this->setup_hooks();
    }
    protected function setup_hooks(){
         // Action and Filters
         add_action('wp_enqueue_scripts', [ $this, 'register_styles']);
         add_action('wp_enqueue_scripts', [ $this, 'register_scripts']);
     }
     public function register_styles(){
         // Register Styles
         wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
         
         wp_register_style('bootstrap',AQUILIA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

         wp_register_style('main.css', AQUILIA_BUILD_CSS_URI.'/main.css', ['bootstrap'], filemtime( AQUILIA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');

         wp_enqueue_style('bootstrap-grid',get_template_directory_uri() . '/assets/src/library/css/bootstrap-grid.min.css', [], false, 'all');

         wp_enqueue_style('fonts-css',get_template_directory_uri() . '/assets/src/library/fonts/fonts.css', [], false, 'all');
 
         
         // Enqueue Style
 
         wp_enqueue_style('style-css');
         wp_enqueue_style('bootstrap');
         wp_enqueue_style('main.css');
 
     }
 
     public function register_scripts(){
 
          // Js File calling
          wp_register_script('main-js', AQUILIA_BUILD_JS_URI. '/main.js', ['jquery'], filemtime(AQUILIA_BUILD_JS_DIR_PATH. '/main.js'), true);

          wp_register_script('bootstrap', AQUILIA_DIR_URI.'/assets/src/js/bootstrap.min.js', ['jquery'], false, true);

          wp_register_script('bootstrap-bundle', AQUILIA_DIR_URI.'/assets/src/js/bootstrap.bundle.min.js', ['jquery'], false, true);
 
         wp_enqueue_script('main-js');
         wp_enqueue_script('bootstrap');
         wp_enqueue_script('bootstrap-bundle');
 
     }
   
}