<?php
/**
 * Theme Function File
 * 
 * @package Aqulia
 * @since 2022
 * 
 */

use AQUILIA_THEME\Inc\AQUILIA_THEME;

if( ! defined( 'AQUILIA_DIR_PATH' )){
    define( 'AQUILIA_DIR_PATH', untrailingslashit( get_template_directory()));
}

if( ! defined('AQUILIA_DIR_URI')){
    define('AQUILIA_DIR_URI', untrailingslashit( get_template_directory_uri()));
}

if( ! defined('AQUILIA_BUILD_URI')){
  define( 'AQUILIA_BUILD_URI', untrailingslashit( get_template_directory_uri()).'/assets/build' );
}

if( ! defined('AQUILIA_BUILD_PATH') ){
  define('AQUILIA_BUILD_PATH', untrailingslashit( get_template_directory() ). '/assets/build');
} 

if( ! defined('AQUILIA_BUILD_JS_DIR_PATH')){
  define('AQUILIA_BUILD_JS_DIR_PATH', untrailingslashit( get_template_directory()) .'/assets/build/js');
}

if( ! defined('AQUILIA_BUILD_JS_URI')){
  define('AQUILIA_BUILD_JS_URI', untrailingslashit( get_template_directory_uri()). '/assets/build/js' );
}

if( ! defined('AQUILIA_BUILD_IMG_URI')){
  define('AQUILIA_BUILD_IMG_URI', untrailingslashit( get_template_directory_uri()). '/assets/build/src/img' );
}

if( ! defined('AQUILIA_BUILD_CSS_DIR_PATH')){
  define('AQUILIA_BUILD_CSS_DIR_PATH', untrailingslashit( get_template_directory()).'/assets/build/css');
}

if( ! defined('AQUILIA_BUILD_CSS_URI')){
  define('AQUILIA_BUILD_CSS_URI', untrailingslashit( get_template_directory_uri()). '/assets/build/css' ); 
}



require_once AQUILIA_DIR_PATH.'/inc/helpers/autoloader.php';
require_once AQUILIA_DIR_PATH.'/inc/helpers/template-tag.php';



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





// bootstrap 5 wp_nav_menu walker
class bootstrap_5_wp_nav_menu_walker extends Walker_Nav_menu
{
  private $current_item;
  private $dropdown_menu_alignment_values = [
    'dropdown-menu-start',
    'dropdown-menu-end',
    'dropdown-menu-sm-start',
    'dropdown-menu-sm-end',
    'dropdown-menu-md-start',
    'dropdown-menu-md-end',
    'dropdown-menu-lg-start',
    'dropdown-menu-lg-end',
    'dropdown-menu-xl-start',
    'dropdown-menu-xl-end',
    'dropdown-menu-xxl-start',
    'dropdown-menu-xxl-end'
  ];

  function start_lvl(&$output, $depth = 0, $args = null)
  {
    $dropdown_menu_class[] = '';
    foreach($this->current_item->classes as $class) {
      if(in_array($class, $this->dropdown_menu_alignment_values)) {
        $dropdown_menu_class[] = $class;
      }
    }
    $indent = str_repeat("\t", $depth);
    $submenu = ($depth > 0) ? ' sub-menu' : '';
    $output .= "\n$indent<ul class=\"dropdown-menu$submenu " . esc_attr(implode(" ",$dropdown_menu_class)) . " depth_$depth\">\n";
  }

  function start_el(&$output, $item, $depth = 0, $args = null, $id = 0)
  {
    $this->current_item = $item;

    $indent = ($depth) ? str_repeat("\t", $depth) : '';

    $li_attributes = '';
    $class_names = $value = '';

    $classes = empty($item->classes) ? array() : (array) $item->classes;

    $classes[] = ($args->walker->has_children) ? 'dropdown' : '';
    $classes[] = 'nav-item';
    $classes[] = 'nav-item-' . $item->ID;
    if ($depth && $args->walker->has_children) {
      $classes[] = 'dropdown-menu dropdown-menu-end';
    }

    $class_names =  join(' ', apply_filters('nav_menu_css_class', array_filter($classes), $item, $args));
    $class_names = ' class="' . esc_attr($class_names) . '"';

    $id = apply_filters('nav_menu_item_id', 'menu-item-' . $item->ID, $item, $args);
    $id = strlen($id) ? ' id="' . esc_attr($id) . '"' : '';

    $output .= $indent . '<li ' . $id . $value . $class_names . $li_attributes . '>';

    $attributes = !empty($item->attr_title) ? ' title="' . esc_attr($item->attr_title) . '"' : '';
    $attributes .= !empty($item->target) ? ' target="' . esc_attr($item->target) . '"' : '';
    $attributes .= !empty($item->xfn) ? ' rel="' . esc_attr($item->xfn) . '"' : '';
    $attributes .= !empty($item->url) ? ' href="' . esc_attr($item->url) . '"' : '';

    $active_class = ($item->current || $item->current_item_ancestor || in_array("current_page_parent", $item->classes, true) || in_array("current-post-ancestor", $item->classes, true)) ? 'active' : '';
    $nav_link_class = ( $depth > 0 ) ? 'dropdown-item ' : 'nav-link ';
    $attributes .= ( $args->walker->has_children ) ? ' class="'. $nav_link_class . $active_class . ' dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"' : ' class="'. $nav_link_class . $active_class . '"';

    $item_output = $args->before;
    $item_output .= '<a' . $attributes . '>';
    $item_output .= $args->link_before . apply_filters('the_title', $item->title, $item->ID) . $args->link_after;
    $item_output .= '</a>';
    $item_output .= $args->after;

    $output .= apply_filters('walker_nav_menu_start_el', $item_output, $item, $depth, $args);
  }
}


// Remove Gutenberg block Library CSS from loading on the frontend
// function aquilia_block_remove_style(){
//   wp_dequeue_style('wp-block-library');
//   wp_dequeue_style('wp-block-library-theme');
//   wp_dequeue_style('wp-block-style');
// }
// add_action('wp_enqueue_scripts'. 'aquilia_block_remove_style');