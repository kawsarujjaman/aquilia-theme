<?php

/**
 * Content Template
 * @package Aquilia
 */

 ?>
 
 <article id="post-<?php the_ID();?>" <?php post_class('mb-5'); ?>>
<?php 
get_template_part('template_parts/componants/blog/entry-header');
get_template_part('template_parts/componants/blog/entry-meta');
get_template_part('template_parts/componants/blog/entry-content');
get_template_part('template_parts/componants/blog/entry-footer');

?>
</article>

