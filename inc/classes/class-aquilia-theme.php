<?php
/**
 * Bootstraps the theme.
 * Add All basic function of this theme.
 * @package Aquilia
 * 
 */


 namespace AQUILIA_THEME\Inc;

 use AQUILIA_THEME\Inc\Traits\Singleton;

 class AQUILIA_THEME {
    use Singleton;

    protected function __construct(){
        // load class
        Assets::get_instance();
        Menus::get_instance();
        $this->setup_hooks();
        
    }
    protected function setup_hooks(){
        // Action 
        
        add_action('after_setup_theme', [ $this, 'aquilia_setup_theme']);

    }

    public function  aquilia_setup_theme(){
        add_theme_support('title-tag');

        add_theme_support('custom-logo', [
            'header-text' => ['site-title', 'site-description'],
            'height'=> '80',
            'width'=> '150',
            'flex-height'=> true,
            'flex-width'=> true,
            'default' => get_template_directory_uri().'/images/logo/AQUILIA (120 × 80 px).png',
        ]);

        add_theme_support('custom-background',[
            'default-color' => '#FFFFFF',
            'default-image' => get_template_directory_uri().'/images/background/bg.jpg',
            'default-preset' => 'default',
            'default-size' => 'cover',
            'default-repeat' => 'no-repeat',
            'default-attachment' => 'scroll',
        ]);

        add_theme_support('post-thumbnails');

        add_theme_support('customize-selective-refresh-widgets');

        add_theme_support('automatic-feed-links');

        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'option',
            'caption',
            'scripts',
            'style',
        ]);

        add_editor_style('service', 'project');

        add_theme_support('wp-block-styles');
        add_theme_support('align-wide');

        global $content_width;
        if( !isset($content_width)){
            $content_width = 1240;
        }
    }

    
 }