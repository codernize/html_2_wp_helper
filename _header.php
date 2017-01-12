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

<header class=" fixed" id="header">
    <nav class="top-bar" data-topbar role="navigation" data-options="scrolltop:false">
        <ul class="title-area">
            <li class="name">
                <a href="<?php echo site_url(); ?>"><img data-interchange="[<?php echo site_url(); ?>/images/logo.png, (default)], [<?php echo site_url(); ?>/images/logo_x2.png, (retina)]" alt="<?php bloginfo('name'); ?>"></a>
            </li>
            <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
            <li class="toggle-topbar menu-icon"><a href="#"><span>Menu</span></a></li>
        </ul>

        <section class="top-bar-section">
      

        <!-- Left Nav Section -->
        <?php 
        $args = array(
            'theme_location'  => 'primary',
            'container'       => false, // Use false for no container, 'div' default
            'container_class' => '',
            // 'container_id'    => '',
            'menu_class'      => ' ',
            // 'menu_id'         => '',
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

