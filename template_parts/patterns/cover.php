<?php
/**
 * Cover Block Pattern Template
 * Gutenburg Template
 * 
 * @package Aquilia
 * 
 */

 $cover_style = esc_url(AQUILIA_BUILD_IMG_URI . '/cat.jpg');
?>



<!-- wp:cover {"url":"<?php  echo esc_url( AQUILIA_BUILD_IMG_URI . '/cat.jpg' );?>","id":95,"dimRatio":50,"isDark":false,"align":"full","className":"aquilia-cover"} -->
<div class="wp-block-cover alignfull is-light aquilia-cover"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-95" alt="cover-img" src="<?php echo esc_url(AQUILIA_BUILD_IMG_URI . '/cat.jpg' );?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:heading {"textAlign":"center","level":1,"textColor":"white"} -->
<h1 class="has-text-align-center has-white-color has-text-color">Great for headers.</h1>
<!-- /wp:heading -->

<!-- wp:paragraph {"align":"center","textColor":"cyan-bluish-gray","fontSize":"medium"} -->
<p class="has-text-align-center has-cyan-bluish-gray-color has-text-color has-medium-font-size">Add an image or video with a text overlay — great for headers.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p></p>
<!-- /wp:paragraph -->

<!-- wp:buttons {"align":"wide","layout":{"type":"flex","justifyContent":"center"}} -->
<div class="wp-block-buttons alignwide"><!-- wp:button {"backgroundColor":"cyan-bluish-gray","textColor":"black","align":"center","className":"is-style-fill","fontSize":"medium"} -->
<div class="wp-block-button aligncenter has-custom-font-size is-style-fill has-medium-font-size"><a class="wp-block-button__link has-black-color has-cyan-bluish-gray-background-color has-text-color has-background wp-element-button" href="#"><code>Blogs</code></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div></div>