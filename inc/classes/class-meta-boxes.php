<?php

/**
 * Register Meta Boxes
 *  
 * @package Aquilia
 * 
 */

namespace AQUILIA_THEME\Inc;

use AQUILIA_THEME\Inc\Traits\Singleton;

class Meta_Boxes {
    use Singleton;

    protected function __construct()
    {
        // Load Class
        $this->setup_hooks();
    }
    protected function setup_hooks(){
        // Action 
        add_action('add_meta_boxes', [$this, 'add_post_title_meta_box']);
        add_action('save_post', [$this, 'save_post_meta_data']);
    }

    public function add_post_title_meta_box( ){
        $screens = ['post', 'service'];
        foreach( $screens as $screen){
            add_meta_box(
                'hide-page-title',  // Unique ID
                __('Hide Page Title', 'aquilia'), // Box Title
                [$this, 'custom_meta_box_html'],    //Content callback, must be of type call back
                $screen,         //Post typpe
                'side'          //Context
            );
        }
    }

    public function custom_meta_box_html( $post ){
        $value = get_post_meta($post->ID, '_hide_page_title', true);

        /**
         * Use nonce for verification
         */
        wp_nonce_field( plugin_basename(__FILE__), 'hide_title_meta_box_nonce_field');
        ?>
        <label for="aquilia-field"> <?php esc_html_e('Hide the page title', 'aquilia');?> </label>
        <select name="aquilia_hide_title_field" id="aquilia-field">
            <option value=""> <?php esc_html_e('Select', 'aquilia');?> </option>

            <option value="yes" <?php selected($value, 'yes'); ?>>
                <?php esc_html_e('Yes', 'aquilia');?> 
            </option>
            <option value="no" <?php selected($value, 'no');?>>
                <?php esc_html_e('No', 'aquilia');?> 
            </option>
        </select>
        <?php
    }

    
    public function save_post_meta_data($post_id){

        /**
         * When the post is saved or update we get $_POST availble
         * Check if the current use is authorised
         */
        if( ! current_user_can('edit_post', $post_id)){
            return;
        }
        /**
         * Check if the nonce value we recived is the same we created
         */

         if( ! isset($_POST['hide_title_meta_box_nonce_field']) || ! wp_verify_nonce( $_POST['hide_title_meta_box_nonce_field'], plugin_basename(__FILE__))){
            return;
         }

        if(array_key_exists('aquilia_hide_title_field', $_POST)){
            update_post_meta(
                $post_id,
                '_hide_page_title',
                $_POST['aquilia_hide_title_field'],
            );
        }
    }
}