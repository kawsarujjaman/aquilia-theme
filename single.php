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
        <h3>Single</h3>
        <?php
        if(have_posts()):
            ?>
            <div class="container">
                <?php 
                if( is_home() && ! is_front_page()){
                    ?>
                    <header class="mb-5 mt-5">
                        <h1 class="page-title screen-reader-text"> 
                            <?php single_post_title('Current Page: ');?>
                         </h1>
                    </header>
                    <?php
                }
                ?>
                <?php
                    while(have_posts()): the_post();
                ?>
                    <h1>
                     <?php the_title();?> 
                    </h1>
                    <?php the_post_thumbnail();?>
                    <?php the_content();?>
                <?php endwhile;?>
            </div>

            <?php
            else: _e('Sorry, No post found,');
        endif;
        ?>

    </main>
</div>


<?php get_footer();?>
