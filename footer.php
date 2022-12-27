<?php
/**
 * 
 * Footer Template
 * 
 * @package Aquilia
 * @since 2022
 */
?>

<footer> 
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <aside>
            <?php if( is_active_sidebar('footer-1')){
                    ?>
                    <aside>
                        <?php dynamic_sidebar('footer-1');?>
                    </aside>
                    <?php
                };?>
            </aside>
        </div>
        <div class="col-md-4">
            <?php if( is_active_sidebar('footer-2')){
                ?>
                <aside>
                    <?php dynamic_sidebar('footer-2');?>
                </aside>
                <?php
            };?>
        </div>
        <div class="col-md-4">
            <?php if( is_active_sidebar('footer-3')){
                ?>
                <aside>
                    <!-- <?php dynamic_sidebar('footer-3');?> -->
                </aside>

                <ul class="d-flex">
                    <li class="list-unstyled"><a href="https://facebook.com" title="facebook"><svg width="50"> <use href="#icon-facebook"></use> </svg></a></li>
                    <li class="list-unstyled"><a href="https://twitter.com" title="twitter"> <svg width="50"> <use href="#icon-twitter "></use> </svg></a></li>
                    <li class="list-unstyled"><a href="https://instagram.com" title="instagram"> <svg width="50"> <use href="#icon-instagram "></use> </svg></a></li>
                </ul>

                <?php
            };?>
        </div>
    </div>
</div>
    
  

</footer>
<?php wp_nav_menu(
    [ 
    'theme_location' => 'aquilia_footer_menu'
    ]
);
    
?>
</div>
</div>

<?php 
get_template_part( 'template_parts/svgs/content', 'svgs' );
wp_footer();
?>
</body>
</html>