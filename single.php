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
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <?php 
                        if( have_posts() ):
                        ?>
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
                                                
                                // Start the loop
                                while( have_posts()): the_post();
                                                
                                    get_template_part( 'template_parts/content' ); 
                                endwhile;
                            else: 
                                get_template_part( 'template_parts/content-none' );
                                ?>
                
                        </div>
                        <?php
                            endif;
                            // For Single Post loadmore button, uncomment this code and comment next and prev link code below.
                            echo do_shortcode( '[single_post_listings]' );
                        ?>  
                        <!--  -->
                        <div class="prev-link">
                            <?php previous_post_link(); ?>
                        </div>
                        <div class="next-link">
                            <?php next_post_link(); ?>
                        </div>
                    </div>                
                </div>  <!-- col-lg-8 col-md-8 col-sm-12 -->
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <?php get_sidebar();?>
                </div>
            </div>
        </div>
    </main>
</div>


<?php get_footer();?>
