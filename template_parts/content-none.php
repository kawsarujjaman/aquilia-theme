<?php

/**
 * The Template part for displaying a message that post cannot be found.
 * @package Aquilia
 */



 ?>
 
<setcion class="no-result not-found">
    <header class="page-header">
        <h1 class="page-title"> <?php esc_html_e('Nothing Found', 'aquilia'); ?> </h1>
    </header>

    <div class="page-content">
        <?php 
        if( is_home() && current_user_can( 'publish_posts' )){
        ?>
        <p>
            <?php printf(wp_kses(
                __( 'Ready to publish your first post? <a href="%s"> Get Started here</a> ', 'aquilia'),
                [
                    'a'=> [
                        'href' => []
                    ]
                ]
            ),
            esc_url(admin_url('post-new.php'))
        );
            ?> 
        </p>
        <?php
        }elseif (is_search()){
            ?>
            <p> <?php esc_html_e('Sorry but nothing matched your search item. Please try again with some different keywords', 'aquilia');?></p>
            <?php
            get_search_form();
        }else{
            ?>

            <p> <?php esc_html_e('It seems that we cannot find what you are looking for. Perhaps search can help', 'aquilia');?></p>
         <?php
             get_search_form();
        }

        ?>
    </div>
</setcion>