<?php

/**
 * Block Patterns function 
 * 
 * @package Aquilia
 * 
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

 class Block_Patterns {
    use Singleton;

    protected function __construct()
    {
        // Load class
        $this-> setup_hooks();
    }

    protected function setup_hooks(){
        // Action
        add_action('init', [$this , 'register_block_patterns']);
        add_action('init', [$this , 'register_block_pattern_categories']);
    }

	public function register_block_patterns(){
		if( function_exists( 'register_block_pattern' )){
			/**
			 * Cover Pattern
			 */
			$cover_content = $this-> get_pattern_content('template_parts/patterns/cover');

			register_block_pattern(
				'aquilia/cover',
				[
					'title' => __('Aquilia Cover','aquilia'),
					'description' => __('Aquilia Cover block with text and Image','aquilia'),
					'categories' =>['cover'],
					'content'=> $cover_content, 
					
					
				]
			);

			$two_columns_content = $this->get_pattern_content('template_parts/patterns/two-columns');

			register_block_pattern(
				'aquilia/two-columns',
				[
					'title'=> __( 'Two Columns', 'aquilia'),
					'description'=> __( 'Two Columns with heading and text', 'aquilia'),
					'categories'=>['columns'],
					'content'=> $two_columns_content,
				]
			);
		}
	}

	public function get_pattern_content($template_path){
		
			ob_start();

			get_template_part($template_path);

			$pattern_content = ob_get_contents();

			ob_end_clean();

			return $pattern_content;

	}

	public function register_block_pattern_categories(){

		$pattern_categories = [
			'cover' => __('Cover', 'aquilia'),
			'columns' => __('Two-Columns', 'aquilia'),
		];

		if( !empty($pattern_categories) && is_array( $pattern_categories) ){

			foreach( $pattern_categories as $pattern_category => $pattern_category_label){

				register_block_pattern_category( 
					$pattern_category, 
					['label' => $pattern_category_label]);

			}
		}
	}
   
 }