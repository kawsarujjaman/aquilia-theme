
<?php 
/**
 * Main File of this theme.
 * 
 * @package Aquilia
 * 
 * 
 */

if( !defined('ABSPATH')) exit;

get_header();

?>


<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="home-page-wrap">
            <?php
                get_template_part( 'template_parts/componants/posts-carousel');
                if(have_posts()):
                    while(have_posts()): the_post();
                        get_template_part('template_parts/content', 'page');
                    endwhile;

                    else: get_template_part('template_parts/content-none');
                endif;

            ?>
        </div>
    </main>
</div>


<?php get_footer();?>
