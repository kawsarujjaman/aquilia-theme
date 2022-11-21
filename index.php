<?php 
/**
 * Main File of this theme.
 * 
 * @package Aquilia
 * @since 1.0.0
 */

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
                        <h1 class="page-title screen-reader-text">
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
                        ?>

                        <h1>  <a href="<?php the_permalink();?>">    <?php the_title();?> </a>  </h1>
                                <?php the_post_thumbnail();?>
                              <div>  <?php the_excerpt();?></div>
                       
                       


                     
                      <?php
                            $index ++;
                            if( 0 !== $index && 0 === $index % $no_of_colums){
                                ?>
                                </div>
                                <?php
                            }

                            ?>
  
              
                <?php endwhile;?>
            </div>
            </div>
            <?php
            else: _e('Sorry, No post found,');
        endif;
        ?>
    </main>
</div>


<?php get_footer();?>
