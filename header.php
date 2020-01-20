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
        <div class="title-bar" data-responsive-toggle="responsive-menu" data-hide-for="medium">
            <a href="<?php echo site_url(); ?>/"><img src="<?php bloginfo('template_url'); ?>/images/logo.png"
                 alt="<?php echo esc_attr(get_bloginfo('name') ); ?>" /></a>
            <div class="align-right">
                <button class="menu-icon dark" type="button" data-toggle="responsive-menu"></button>
                <div class="title-bar-title" data-toggle="responsive-menu">Menu</div>
                
            </div> <!-- /.align-right -->     
        </div>

        <div class="top-bar" id="responsive-menu">
            <div class="top-bar-left" >
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
            </div>
            

            <div class="top-bar-right">
                <ul class="menu">
                    <li><a href="#" class="button">CONTACT</a></li>
                  
                </ul>
            </div>
        </div>

        
    </header>