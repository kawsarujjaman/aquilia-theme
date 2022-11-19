<?php

/**
 * Enqueue Theme assets
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
        wp_register_style('style-css', AQUILIA_DIR_URI , [], filemtime(AQUILIA_DIR_PATH.'/style.css'), 'all');
        wp_register_style('bootstrap',AQUILIA_DIR_URI . '/assets/src/css/bootstrap.min.css', [], false, 'all');
   
        // Enqueue Style

        wp_enqueue_style('style-css');
        wp_enqueue_style('bootstrap');

    }

    public function register_scripts(){

         // Js File calling
        wp_register_script('main-js', AQUILIA_DIR_URI. '/assets/main.js', [], filemtime(AQUILIA_DIR_PATH. '/assets/main.js'), true);
        wp_enqueue_script('bootstrap', AQUILIA_DIR_URI.'/assets/src/js/bootstrap.min.js', ['jquery'], false, true);

        wp_enqueue_script('main-js');
        wp_enqueue_script('bootstrap');

    }
    
}