<?php
/**
 * 
 * Header Template
 * 
 * @package Aquilia
 * @since 2022
 */
?>
<!DOCTYPE html>
<html lang="<?php language_attributes();?>">
<head>
    <meta charset="<?php bloginfo('charset');?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php wp_head();?>

</head>
<body <?php body_class();?>>
    <?php wp_body_open();?>


<div id="page" class="site">
    <header id="masterhead" class="site-header" role="banner">
    <!-- Navbar start -->
    <?php get_template_part('template_parts/header/nav');?>
    </header>

    <div id="content" class="site-content">

