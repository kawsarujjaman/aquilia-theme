
<?php
/**
 * Author page template file
 * 
 * @package Aquilia
 */
if( !defined('ABSPATH')) exit;

get_header();

$author = get_queried_object();

?>


<div id="primary">
    <main id="main" class="site-main mt-5" role="main">
        <div class="container">        
          <?php get_template_part('template_parts/author/header');?>

          <div class="site-content">
            <?php
            if( !empty(get_the_author() )) {
                printf(
                    '<h3 class="font-size-xl h3 pb-4"> %1$s %2$s </h3>',
                    __('Articles written by', 'aquilia'),
                    get_the_author(),
                );
            };
                
                ?>
                <div class="row">
                    <?php
                        if( have_posts(  )):
                            while(have_posts(  )) : the_post();
                            get_template_part( 'template_parts/content', '', [ 'container_classes' => 'col-lg-4 col-md-6 col-sm-12 pb-4']);
                            endwhile;
                        else:
                            get_template_part( 'template_parts/content-none');
                        endif;
                    ?>
                </div>
                <div class="">
                    <?php aquilia_pagination();?>
                </div>
          </div>
        </div>
             
    </main>
</div>


<?php get_footer();?>
