<?php

/**
 *The Template for post entry Footer
 * 
 * To be used inside of WordPress The Loop
 *
 * @package Aquilia
 */

 $the_post_id = get_the_ID();
 $articale_terms = wp_get_post_terms( $the_post_id, [ 'category', 'post_tag']);

if( empty( $articale_terms) && ! is_array( $articale_terms)){
    return;
}

 ?>

 <div class="entry-footer mt-4">
    <?php 
        foreach ($articale_terms as $key=> $articale_term ){
            ?>
<button class="btn border border-secondary mb-2 mr-2"> 
    <a class="entry-footer-link text-black-50" href="<?php echo esc_url(get_term_link($articale_term))?>"> 
    <?php echo esc_html($articale_term->name);?>
    </a></button>
            <?php

        }
    ?>
 </div>