<?php 
/**
 * Main File of this theme.
 * 
 * @package Aquilia
 * 
 * Testimonials page
 * 
 * Template name: Testimonials
 * 
 */

if( !defined('ABSPATH')) exit;

get_header();

?>


<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <?php 
        if(have_posts()):
            while(have_posts(  )) : the_post();
            ?>
           <div class="row">
            <div class="col-md-12">
                <?php the_content( );?>
            </div>
           </div>
  
            
                <?php endwhile;
              
                 ?>

            </div>
            </div>

        <?php
            else: get_template_part('template_parts/content-none');
            endif;
           
        ?>
       
    </main>
</div>


<?php get_footer();?>
