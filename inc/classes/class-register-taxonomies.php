<?php
/**
 * Register Custom Texonomies
 * 
 * @package Aquilia
 */

 namespace AQUILIA_THEME\Inc;

 use Aquilia_theme\Inc\Traits\Singleton;

 class Register_Taxonomies {
    use Singleton;

    protected function __construct()
    {
        // Load Class
        $this->setup_hooks();
    }
    protected function setup_hooks(){
        /**
         * Actions
         */
        add_action( 'init', [$this, 'create_genre_taxonomy'] );
    }

    public function create_genre_taxonomy() {
        $labels = [
            'name' =>_x('Genres', 'taxonomy general name', 'aquilia'),
            'singular_name' =>_x('Genre', 'taxonomy general name', 'aquilia'),
            'search_items' => __('Search Genres', 'aquilia'),
            'all_items'         => __( 'All Genres', 'aquilia' ),
			'parent_item'       => __( 'Parent Genre', 'aquilia' ),
			'parent_item_colon' => __( 'Parent Genre:', 'aquilia' ),
			'edit_item'         => __( 'Edit Genre', 'aquilia' ),
			'update_item'       => __( 'Update Genre', 'aquilia' ),
			'add_new_item'      => __( 'Add New Genre', 'aquilia' ),
			'new_item_name'     => __( 'New Genre Name', 'aquilia' ),
			'menu_name'         => __( 'Genre', 'aquilia' ),
        ];
        $args= [
            'labels' => $labels,
            'description'=> __('Movie Genre', 'aquilia'),
            'public'=> true,
            'hierarchical'=> true,
            'publicly_queryable'=> true,
            'show_ui'            => true,
			'show_in_menu'       => true,
			'show_in_nav_menus'  => true,
			'show_tagcloud'      => true,
			'show_in_quick_edit' => true,
			'show_admin_column'  => true,
			'show_in_rest'       => true,
        ];
        register_taxonomy( 'genre', ['movies'], $args);
    }
 }