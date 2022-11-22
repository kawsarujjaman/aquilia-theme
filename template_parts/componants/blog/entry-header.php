<?php

/**
 *The Template for post entry header
 * @package Aquilia
 */

 $the_post_id = get_the_ID();
 $hide_title = get_post_meta( $the_post_id, '_hide_page_title', true);

//  echo '<pre>';
//  print_r($the_post_id. ' ' . $hide_title);
//  wp_die();
$has_post_thumbnail = get_the_post_thumbnail();

 ?>


 <header class="entry-header">
    <?php
    // Feateur Image

    if(has_post_thumbnail()){
        ?>
        <div class="entry-image mb-3">
            <a href="<?php echo esc_url(get_permalink());?>">

            <?php ;
            the_post_custom_thumbnail(
                $the_post_id,
                'featured-thumbnail',
                [
                    'sizes' => '(max-width: 590px), 350px, 235px',
                    'class' => 'attachement-feature-large size-featured-image'
                ]
            );
            ?>
        </a>
        </div>
        <?php
    }
    ?>
 </header>