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
        <?php 
        if(have_posts()):
            ?>
            <div class="container">
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
                $index = 0;
                $no_of_colums= 1;
                // Start the loop
                    while(have_posts()): the_post();

                    if( 0 === $index % $no_of_colums ){
                        ?>
                        <div class="col-lg-4 col-md-6 col-sm-12">
                        <?php
                        }
                  
                        get_template_part('template_parts/content');
                        $index ++;
                        if( 0 !== $index && 0 === $index % $no_of_colums){
                            ?>
                            </div>
                            <?php
                        }

                        ?>
  
              
                <?php endwhile;
                 aquilia_pagination();
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
