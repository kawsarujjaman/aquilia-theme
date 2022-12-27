<?php
/**
 * Post card
 * 
 * Note: Should be called with the loop
 */

 if( empty( get_the_ID(  ))){
    return null;
 }

 $post_permalink = get_the_permalink(  );
 $post_title = get_the_title(  );

 ?>

 <section id="post<?php the_ID();?>" class="col-lg-4 col-md-6 col-sm-12 pb-4">
    <header>
        <a href="<?php echo esc_url( $post_permalink );?>" class="block">
            <figure class="img-container">
                <?php the_post_thumbnail( 'post-thumbnail', ['class'=> 'absolute w-full h-full left-0 top-0 object-cover'])?>
            </figure>
        </a>
    </header>
    <div class="post-excerpt my-4">
        <a href="<?php echo esc_url( $post_permalink); ?>" title="<?php echo esc_html( $post_title );?>">
            <?php the_title( '<h3 class="post-title">', '</h3>');?>
        </a>

        <div class="mb-4 truncate-4">
            <?php aquilia_the_excerpt(150); ?>
        </div>
        <a href="<?php echo esc_url($post_permalink); ?>" title="<?php echo esc_html( $post_title );?>">
            <?php esc_html_e( 'View More', 'techitdev');?>
        </a>
    </div>
 </section>