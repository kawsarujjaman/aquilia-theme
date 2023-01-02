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



/**
 * Entry Meta
 * This function show date on blog page. After post title
 */
 function aquilia_post_on(){
   $time_string = '<time class="entry-date published updated" datetime="%1$s"> %2$s</time>';

   // Post is modified (When post published time is not equal to post modified time)
   if( get_the_time( 'U' !==get_the_modified_time( 'U' ))){
      $time_string =  '<time class="entry-date published" datetime="%1$s"> %2$s</time><time class="update" datetime="%3$s"> %4$s</time>';
   }

   $time_string = sprintf($time_string,
   esc_attr( get_the_date( DATE_W3C)),
   esc_attr(get_the_date()),

   esc_attr(get_the_modified_date( DATE_W3C)),
   esc_attr(get_the_modified_date() ),
   
   );

   $posted_on = sprintf(
      esc_html_x('Posted on %s', 'post date', 'aquilia'),
      '<a href=" '.esc_url(get_permalink()) .' " rel="bookmark" >' . $time_string. '</a>'
   );
   echo '<span class="posted-one text-secondary"> ' .$posted_on. ' </span>';
 }

 function aquilia_posted_by(){
   $byline = sprintf(
      esc_html_x('by %s', 'post author', 'aquilia'),
      '<span class="author vcard" > <a href=" '.esc_url(get_author_posts_url( get_the_author_meta('ID'))).' "> '.esc_html(get_the_author()).' </a> </span>'
   );
   echo '<span class="byline text-secondary">'.$byline. ' </span>';
 }



/**
 * Entry content-> the_excerpt
 * @param int $trim_character_count
 * 
 */
function aquilia_the_excerpt( $trim_character_count = 0 ) {
	$post_ID = get_the_ID();

	if ( empty( $post_ID ) ) {
		return null;
	}

	if ( has_excerpt() || 0 === $trim_character_count ) {
		the_excerpt();

		return;
	}

	$excerpt = wp_html_excerpt( get_the_excerpt( $post_ID ), $trim_character_count, '[...]' );


	echo $excerpt;
}

function aquilia_read_more( $more = ''){
   if( ! is_single()){
      $more = sprintf( '<br/><button class="btn btn-info mb-4 mt-3"> <a class="aquilia-read-more text-white" href="%1$s"> %2$s </a> </button>',
      get_permalink( get_the_ID()),
      __('Read More', 'aquilia')
      );
   }
   return $more;
}

function aquilia_pagination(){
   $allowed_tags = [
      'span' =>[
         'class'=> []
      ],
      'a'=> [
         'class'=> [],
         'href'=> [],
      ]
   ];

   $arrgs = [
      'before_page_number'=> '<span class="btn border border-secondary mr-2 mb-2"> ',
      'after_page_number'=> '</span>',
   ];


  printf( '<nav class="aquilia-pagination clearfix"> %s </nav>', wp_kses(paginate_links( $arrgs ), $allowed_tags) );
}
/**
 * Checks to see if the specified user id has a uploaded the image via wp_admin.
 *
 * @return bool  Whether or not the user has a gravatar
 */

 function aquilia_is_upload_via_wp_admin( $gravatar_url){
   $parsed_url = wp_parse_url( $gravatar_url );

   $query_args = !empty( $parsed_url['query']) ? $parsed_url['query'] : '';
   // If query args is empty means, user has uploaded gravatar

   return empty($query_args);
 }

 /**
 * If the gravatar is uploaded returns true.
 *
 * There are two things we need to check, If user has uploaded the gravatar:
 * 1. from WP Dashboard, or
 * 2. or gravatar site.
 *
 * If any of the above condition is true, user has valid gravatar,
 * and the function will return true.
 *
 * 1. For Scenario 1: Upload from WP Dashboard:
 * We check if the query args is present or not.
 *
 * 2. For Scenario 2: Upload on Gravatar site:
 * When constructing the URL, use the parameter d=404.
 * This will cause Gravatar to return a 404 error rather than an image if the user hasn't set a picture.
 *
 * @param $user_email
 *
 * @return bool
 */
function aquilia_has_gravatar( $user_email ) {

	$gravatar_url = get_avatar_url( $user_email );

	if ( aquilia_is_upload_via_wp_admin( $gravatar_url ) ) {
		return true;
	}

	$gravatar_url = sprintf( '%s&d=404', $gravatar_url );

	// Make a request to $gravatar_url and get the header
	$headers = @get_headers( $gravatar_url );

	// If request status is 200, which means user has uploaded the avatar on gravatar site
	return preg_match( "|200|", $headers[0] );
}