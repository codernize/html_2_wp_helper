<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php
            /*
             * Print the <title> tag based on what is being viewed.
             */
            global $page, $paged;

            wp_title( '|', true, 'right' );

            // Add the blog name.
            bloginfo( 'name' );

            // Add the blog description for the home/front page.
            $site_description = get_bloginfo( 'description', 'display' );
            if ( $site_description && ( is_home() || is_front_page() ) )
                echo " | $site_description";

            // Add a page number if necessary:
            if ( $paged >= 2 || $page >= 2 )
                echo ' | ' . sprintf( __( 'Page %s', 'themename' ), max( $paged, $page ) );

            ?>

        </title>
        <?php wp_head(); ?>
    </head>
    <body <?php body_class() ?>>

    <header id="header">
        <nav class="top-bar" data-topbar role="navigation" data-options="scrolltop:false">
            <div class="top-bar-title">
                <a href="<?php echo site_url(); ?>" title="<?php bloginfo('name'); ?>" class="logo" ><img src="<?php bloginfo('template_url'); ?>/images/logo.png" alt="<?php bloginfo('name'); ?>" /></a>
                <span data-responsive-toggle="responsive-menu" data-hide-for="medium">
                    <button class="menu-icon dark" type="button" data-toggle></button>
                </span>
            </div>
            <section id="responsive-menu">
              <!-- Left Nav Section -->
              <?php 
                $args = array(
                    'theme_location'  => 'primary',
                    'container'       => false, // Use false for no container, 'div' default
                    'container_class' => 'top-bar-center',
                    'container_id'    => '',
                    'menu_class'      => 'vertical medium-horizontal menu',
                    'menu_id'         => '',
                    'depth'           => 1,
                    'echo'        => false ,
                );
                $menu = wp_nav_menu($args);
                // play with $menu
                
                echo $menu; 
              ?>
            </section>

        </nav>
    </header>