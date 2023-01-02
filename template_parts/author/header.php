<?php
/**
 * Author Header Template part
 * 
 * @package Aquilia
 */

 $author_email = get_the_author_meta( 'user_email');
 $has_avatar = aquilia_has_gravatar ( $author_email);
 $avatar = get_avatar( $author_email, 240, '', '', ['class'=> 'rounded-circle', 'default'=> '404'] );

 ?>

 <header class="page-header row mb-4">
    <div class="author-col-one mb-3 col-lg-3 col-md-3 c0l-sm-12">
        <div id="author-avatar" class="author-avatar d-flex align-items-start">
            <?php 
                if( !empty( $has_avatar)){
                    echo wp_kses_post( $avatar );
                }
                else{
                    printf(
                        '<span id="author-firstname" class="d-none"> %1$s </span> <span id="author-lastname" class="d-none">%2$s</span>
                        <div id="author=profile-img" style="width: 230px;height: 230px;" class="rounded-circle bg-secondary position-relative"><span class="h1 text-white inset-center"></span> </div>',
                        esc_html( get_the_author_meta('first_name') ),
                        esc_html( get_the_author_meta('last_name') )
                    );
                }
            ?>
        </div>
    </div>
 </header>