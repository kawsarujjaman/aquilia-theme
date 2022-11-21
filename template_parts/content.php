<?php

/**
 * Content Template
 * @package Aquilia
 */

 ?>
 
<h1>  <a href="<?php the_permalink();?>">    <?php the_title();?> </a>  </h1>
<?php the_post_thumbnail();?>
<div>  <?php the_excerpt();?></div>
