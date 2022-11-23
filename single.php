<?php 
/**
 * Single post Template 
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
   
        <?php 
            if(have_posts()):
             ?>
          <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="post-wrap">
                        <?php            
                            if ( is_home() && ! is_front_page() ) {
                            ?>
                            <header class="mb-5">
                                <h1 class="page-title">
                                    <?php single_post_title(); ?>
                                </h1>
                            </header>
                            <?php
                            }
                            ?>
                            <div class="row">
                                <?php                
                                    // Start the loop
                                    while(have_posts()): the_post();
                                    ?>                  
                                    <div class="col-md-12">                  
                                        <?php get_template_part('template_parts/content'); ?>
                                    </div>                          
                                <?php endwhile;?>
                        </div>
                    </div>
                    <!--  -->
                        <div class="prev-link">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="next-link">
                            <?php next_post_link(); ?>
                        </div>
                    </div>

                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar();?>
                </div>
            </div>
          </div>

        <?php
            else: get_template_part('template_parts/content-none');
            endif;
        ?>    
    </main>
</div>


<?php get_footer();?>
