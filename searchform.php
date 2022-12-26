<?php

/**
 * Custom search form
 * @package Aquilia
 */
?>

 <form role="search" class="form-inline search-form my-2 my-lg-0" action="<?php echo esc_url( home_url( '/') )?>" method="get">
    <span class="screen-reader-text" > <?php echo _x('Search for:', 'label', 'aquilia'); ?></span>
    <input type="search" class="form-control mr-sm-2" placeholder="<?php echo esc_attr_x('Search', 'Placeholder', 'aquilia'); ?>" value="<?php the_search_query();?>" aria-label="Search" name="s">
    <button type="submit" class="btn btn-outline-sucess my-2 my-sm-0"> <?php echo esc_attr_x( 'Search', 'submit button', 'aquilia' )?> </button>
</form>