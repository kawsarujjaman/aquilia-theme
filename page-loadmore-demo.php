<?php
/**
 * Page template
 * 
 * @package Aquilia
 */

 use AQUILIA_THEME\Inc\loadmore_posts;

 get_header();

 $loadmore_posts = loadmore_posts::get_instance();

 ?>

 <div class="container">
    <h1 class="mb-4">Loarmore Demo </h1>
    <?php $loadmore_posts->post_script_load_more();?>
 </div>

 <?php get_footer();?>