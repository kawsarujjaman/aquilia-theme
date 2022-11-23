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
    <h3>Footer</h3>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4">
            <?php if( is_active_sidebar('footer-1')){
                ?>
                <aside>
                    <?php dynamic_sidebar('footer-1');?>
                </aside>
                <?php
            };?>
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
                    <?php dynamic_sidebar('footer-3');?>
                </aside>
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

<?php wp_footer();?>
</body>
</html>