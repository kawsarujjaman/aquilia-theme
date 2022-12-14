<?php

/**
 * Blocks function 
 * 
 * @package Aquilia
 * 
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

 class Blocks {
    use Singleton;

    protected function __construct()
    {
        // Load class
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        // Action
        add_action('block_categories_all', [$this , 'add_block_categories']);
    }

	public function add_block_categories( $categories ){
		$category_slugs = wp_list_pluck( $categories,'slug' );

		return in_array('aquilia', $category_slugs, true) ? $categories : 
		array_merge(
			$categories,
			[
				[
					'slug'=> 'aquilia',
					'title' => __('Aquilia Blocks', 'aquilia'),
					'icon' => 'dashicons-admin-customizer'
				]
			]
		);
	
	}
	
   
 }