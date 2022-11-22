<?php

/**
 * 
 * The Template for show post Thumbnail
 * @package Aquilia
 * 
 */

 function get_the_post_custom_thumbnail($post_id, $size= 'featured-thumbnail', $additonal_attributes = [] ){
    $custom_thumbnail = '';

    if( null == $post_id){
        $post_id = get_the_ID();
    }

    if(has_post_thumbnail( $post_id )){
       $default_attributes = [
        'looding' => 'lazy',
       ];

       $attributes = array_merge( $additonal_attributes , $default_attributes );

       $custom_thumbnail = wp_get_attachment_image(
           get_post_thumbnail_id( $post_id ),
           $size,
           false,
           $attributes,
       );

    }
  

    return $custom_thumbnail;
 }

/**
 * Renders custom Thumbnail with lazy load.
 * 
 *  @param init   $post_id    post ID
 * 
 * @param string $size      The Register Image size.
 * @param array $additional_attributes Additional attributes
 * 
*/

 function the_post_custom_thumbnail($post_id, $size= 'featured-thumbnail', $additonal_attributes = [] ){
    echo get_the_post_thumbnail($post_id, $size, $additonal_attributes);
 }