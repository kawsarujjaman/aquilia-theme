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
         add_action('enqueue_block_assets', [ $this, 'enqueue_editor_assets']);
     }
     public function register_styles(){
         // Register Styles
        //  wp_register_style('style-css', get_stylesheet_uri(), [], filemtime(get_template_directory() . '/style.css'));
         
        wp_register_style('bootstrap',AQUILIA_DIR_URI . '/assets/src/library/css/bootstrap.min.css', [], false, 'all');

         wp_register_style('main.css', AQUILIA_BUILD_CSS_URI.'/main.css', ['bootstrap'], filemtime( AQUILIA_BUILD_CSS_DIR_PATH . '/main.css'), 'all');
         wp_register_style('slick-css', AQUILIA_BUILD_LIB_URI.'/css/slick.css',[], false, 'all');
         wp_register_style('slick-theme-css', AQUILIA_BUILD_LIB_URI.'/css/slick-theme.css',['slick-css'], false, 'all');

         wp_enqueue_style('bootstrap-grid',get_template_directory_uri() . '/assets/src/library/css/bootstrap-grid.min.css', [], false, 'all');

        //  wp_enqueue_style('fonts-css',get_template_directory_uri() . '/assets/src/library/fonts/fonts.css', [], false, 'all');
 
         
         // Enqueue Style

         wp_enqueue_style('bootstrap');
         wp_enqueue_style('slick-css');
         wp_enqueue_style('slick-theme-css');
         wp_enqueue_style('main.css');
 
     }
 
     public function register_scripts(){
 
          // Js File calling
          wp_register_script('main-js', AQUILIA_BUILD_JS_URI. '/main.js', ['jquery', 'slick.min'], filemtime(AQUILIA_BUILD_JS_DIR_PATH. '/main.js'), true);

          wp_register_script('single-js', AQUILIA_BUILD_JS_URI. '/single.js', ['jquery', 'slick.min'], filemtime(AQUILIA_BUILD_JS_DIR_PATH. '/single.js'), true);

          wp_register_script('author-js', AQUILIA_BUILD_JS_URI. '/author.js', ['jquery'], filemtime(AQUILIA_BUILD_JS_DIR_PATH. '/author.js'), true);

          wp_register_script('slick.min', AQUILIA_BUILD_LIB_URI.'/js/slick.min.js', ['jquery'], false, true);
          wp_register_script('bootstrap', AQUILIA_DIR_URI.'/assets/src/js/bootstrap.min.js', ['jquery'], false, true);

          wp_register_script('bootstrap-bundle', AQUILIA_DIR_URI.'/assets/src/js/bootstrap.bundle.min.js', ['jquery'], false, true);
 
          // Enque Js File
         wp_enqueue_script('main-js');
         wp_enqueue_script('slick.min');
         wp_enqueue_script('bootstrap');
         wp_enqueue_script('bootstrap-bundle');

         if( is_single( )){
            wp_enqueue_script( 'single-js' );
         }


        if( is_author()){            
         wp_enqueue_script('author-js');
        }


        
         wp_localize_script( 'main-js', 'siteConfig', [
			'ajaxUrl'    => admin_url( 'admin-ajax.php' ),
			'ajax_nonce' => wp_create_nonce( 'loadmore_post_nonce' ),
		] );
 
     }

     public function enqueue_editor_assets(){
        $asset_config_file = sprintf( '%s/assets.php', AQUILIA_BUILD_PATH );

        if( ! file_exists( $asset_config_file )){
            return;
        }
        $asset_config = require_once $asset_config_file;

        if( empty( $asset_config['js/editor.js'] )){
            return;
        }

        $editor_asset = $asset_config['js/editor.js'];
        $js_dependencies = ( ! empty( $editor_asset['dependencies'])) ? $editor_asset['dependencies'] : [] ;
        $version = ( !empty( $editor_asset['version'] )) ? $editor_asset['version'] : filemtime( $asset_config_file );

        // Theme Gutenberg block JS
        if( is_admin()){
            wp_enqueue_script(
                'aquilia-block-js',
                AQUILIA_BUILD_JS_URI . '/blocks.js',
                $js_dependencies,
                $version,
                true
            );
        }

        // Theme gutenberg blocks CSS

        $css_dependencies = [
            'wp-block-library-theme',
            'wp-block-library'
        ];
        wp_enqueue_style(
            'aquilia-block-css',
            AQUILIA_BUILD_CSS_URI . '/blocks.css',
            $css_dependencies,
            filemtime(AQUILIA_BUILD_CSS_DIR_PATH . '/blocks.css' ),
            'all'
        );
     }
   
}