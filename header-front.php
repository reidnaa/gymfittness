<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <?php wp_head(); ?>
</head>
<body <?php body_class();?> >

<header class="site-header">
    <div class="container header-grid">
        <div class="navigation-bar">
            <div class="logo">
                <a href="<?php echo home_url('home')?>"><img src="<?php echo  get_template_directory_uri() . '/img/logo.svg';?>" alt="Site Logo"/></a>
            </div> <!-- logo --> 

            <!-- todo: add navigation -->
            <?php 
            $args = array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'main-menu'
            );

            wp_nav_menu($args);
            ?>
        </div><!-- navigation-bar -->

        <div class="tagline text-center">
            <h1><?php the_field('hero_tagline')?> </h1>
            <p><?php the_field('hero_content'); ?></p>
        </div>
    </div><!-- container -->
    
</header>

