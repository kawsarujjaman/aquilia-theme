<?php

/**
 * Content Template
 * @package Aquilia
 */

 $container_classes = !empty( $args['container_classes']) ? $args['container_classes'] : 'mb-5';
 ?>
 
 <article id="post-<?php the_ID();?>" <?php post_class($container_classes); ?>>
<?php 
get_template_part('template_parts/componants/blog/entry-header');
get_template_part('template_parts/componants/blog/entry-meta');
get_template_part('template_parts/componants/blog/entry-content');
get_template_part('template_parts/componants/blog/entry-footer');

?>
</article>

