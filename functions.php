<?php
/**
 * Theme Function File
 * 
 * @package Aqulia
 * @since 2022
 * 
 */

use AQUILIA_THEME\Inc\AQUILIA_THEME;

if( !defined( 'AQUILIA_DIR_PATH' )){
    define( 'AQUILIA_DIR_PATH', untrailingslashit(get_template_directory()));
}

if( !defined('AQUILIA_DIR_URI')){
    define('AQUILIA_DIR_URI', untrailingslashit(get_template_directory_uri()));
}

require_once AQUILIA_DIR_PATH.'/inc/helpers/autoloader.php';



function aquilia_get_theme_instance()
{ 
    \AQUILIA_THEME\Inc\AQUILIA_THEME::get_instance();
}
aquilia_get_theme_instance();



// function aquilia_enqueue_scripts(){
//     // CSS file Calling
//     wp_enqueue_style('stylesheet', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));

//     // Bootstrap CDN
//     wp_register_style('bootstrap', get_template_directory_uri(). '/assets/src/css/bootstrap.min.css', '5.0.2', 'all');


//     wp_enqueue_style('bootstrap');


    
//     // Js File calling
//     wp_register_script('main-js', get_template_directory_uri(). '/assets/main.js', [], filemtime(get_template_directory(). '/assets/main.js'), true);
//     wp_enqueue_script('bootstrap', get_template_directory_uri().'/assets/src/js/bootstrap.min.js', ['jquery'], false, true);

//     wp_enqueue_script('main-js');
//     wp_enqueue_script('bootstrap');
// }
// add_action('wp_enqueue_scripts', 'aquilia_enqueue_scripts');




