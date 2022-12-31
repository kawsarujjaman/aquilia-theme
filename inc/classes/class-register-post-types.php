<?php

/**
 * Register PostType
 * 
 * @package Aquilia
 */

 namespace AQUILIA_THEME\Inc;

 use AQUILIA_THEME\Inc\Traits\Singleton;

 class Register_Post_Types {
    use Singleton;

    protected function __construct()
    {
        /**
         * Load Class.
         */
       $this->setup_hooks();
    }

    protected function setup_hooks(){
        /**
         * Actions.
         */
        add_action( 'init', [ $this, 'create_movie_cpt'], 0);
    }

    // Register Custom post type movie
    public function create_movie_cpt(){
        $labels= [
            'name'=> _x('Movies', 'aquilia'),
            'singular_name'=> _x('Movie', 'aquilia'),
            'Menu_name'=> _x('Movies', 'aquilia'),
            'name_admin_bar'=> _x('Movies', 'aquilia'),
            'archives'=> __('Movie Archive', 'aquilia'),
            'attribute'=> __('Movie Attributes', 'aquilia'),
            'add_new'=> __('Add new', 'aquilia'),
            'new_item'=> __('New movie', 'aquilia'),
            'edit_item'=> __('Edit movie', 'aquilia'),
            'update_item'=> __('Update movie', 'aquilia'),
            'search_item'=> __('Search movie', 'aquilia'),
            'not_found'=> __('Not Found', 'aquilia'),
            'not_found_in_trash'=> __('Not Found in trash', 'aquilia'),
        ];
        $args = [
            'label'=> __('Movie', 'aquilia'),
            'description'=> __('Movies Description', 'aquilia'),
            'labels'=> $labels,
            'menu_icon'=> 'dashicons-video-alt',
            'supports'=> ['title', 'editor','excerpt', 'thumbnail', 'revisions', 'author', 'comments','tracbacks','page-attributes','custom-fields'],
            'taxonomies'=> [],
            'public'=> true,
            'show_ui'=> true,
            'show_in_menu'=> true,
            'menu_position'=> 5,
            'show_in_admin_bar'=> true,
            'show_in_nav_menus'=> true,
            'can_export'=> true,
            'has_archive'=> true,
            'hierarchical'=> true,
            'include_from_search'=> true,
            'publicly_queryable'=> true,
            'capability_type'=> 'post',
        ];
        register_post_type( 'movies', $args);
    }
 }