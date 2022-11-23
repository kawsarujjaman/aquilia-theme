<?php

/**
 * Enqueue Theme assets
 * 
 * @package Aquilia
 * 
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

class Sidebars {
    use Singleton;

    protected function __construct()
    {
        // Load Class
        $this->setup_hooks();
    }
    protected function setup_hooks(){
         
        // Action
     add_action('widgets_init', [$this, 'aquilia_register_sidebar']);
     add_action('widgets_init', [$this, 'aquilia_register_clock_widget']);

    //  add_action('widgets_init', [$this, 'aquilia_register_custom_clock_widget']);
    }
   
    public function aquilia_register_sidebar(){
        register_sidebar( [
            'name'=> __('Main Sidebar', 'aquilia'),
            'id'=> 'main-sidebar',
            'desc'=> __('Main Sidebar', 'aquilia'),
            'before_widget'=> '<div id="%1$s" class="widget widget-sidebar %2$s"> ',
            'after_widget'=> '</div>',
            'before_title'=> '<h3 class="widget-title"> ',
            'after_title'=> '</h3> ',
        ] );

        // Footer section sidebar 
        register_sidebar(array(
            'name'=> __('Footer Sidebar 1', 'aquilia'),
            'id'=> 'footer-1',
            'desc'=> __('Footer Sidebar', 'aquilia'),
            'before_widget'=> '<div id="%1$s" class="widget widget-footer cell %2$s"> ',
            'after_widget'=> '</div>',
            'before_title'=> '<h3 class="widget-title"> ',
            'after_title'=> '</h3> ',
        ));
        register_sidebar(array(
            'name'=> __('Footer Sidebar 2', 'aquilia'),
            'id'=> 'footer-2',
            'desc'=> __('Footer Sidebar two', 'aquilia'),
            'before_widget'=> '<div id="%1$s" class="widget widget-footer cell %2$s"> ',
            'after_widget'=> '</div>',
            'before_title'=> '<h3 class="widget-title"> ',
            'after_title'=> '</h3> ',
        ));
        register_sidebar(
            [
                'name'=> __('Footer Sidebar 3', 'aquilia'),
                'id'=> 'footer-3',
                'desc'=> __('Footer Sidebar three', 'aquilia'),
                'before_widget'=> '<div id="%1$s" class="widget widget-footer cell %2$s"> ',
                'after_widget'=> '</div>',
                'before_title'=> '<h3 class="widget-title"> ',
                'after_title'=> '</h3> '        
            ]
        );
    }

    // Custom Widget
    // public function aquilia_register_custom_clock_widget(){
    //     register_widget( 'AQUILIA_THEME\Inc\Clock_Widget ' );
    // }

   public function aquilia_register_clock_widget(){
        register_widget( 'AQUILIA_THEME\Inc\Clock_Widget' );
    }
}