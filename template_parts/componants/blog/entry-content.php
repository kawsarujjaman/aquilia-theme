<?php

/**
 *The Template for post entry Content
 * @package Aquilia
 */

 ?>

 <div class="entry-content">
    <?php 
        if(is_single()){
            the_content(
                sprintf(
                    wp_kses(
                        __('Continue reading %s <span class="meta-nav"> $arrr; </span>', 'aquilia' ),
                        [
                            'span' => [
                                'class' =>[]
                            ]
                        ]
                    ),
                    the_title('<span class="screen-reader-text">"','"</span>', false)
                )
            );
            wp_link_pages(
                [
                'before' => '<div class="page-links">'. esc_html__( 'Pages:', 'aquilia' ),
                'after'=> '</div>',
                ]
            );
        }
        else{
            aquilia_the_excerpt( 100 );
            echo aquilia_read_more();
        }
    ?>
 </div>