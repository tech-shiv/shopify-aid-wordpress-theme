<?php



/**

 *

 * The header for our theme

 *

 * This is the template that displays all of the <head> section and everything up until <div id="content">

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package WordPress

 * @subpackage Shopify_Aid

 */



?>

<!DOCTYPE html>

<!--[if (gte IE 9)|!(IE)]><!-->

<html class="not-ie no-js" <?php language_attributes(); ?>>

<!--<![endif]-->

<html lang="en">



<head>

    <meta charset="UTF-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <?php wp_head(); ?>

</head>



<body <?php body_class(); ?> id="scroll-top">
    <?php wp_body_open();
    $wrapper_classes  = 'site-header';
    $wrapper_classes .= has_custom_logo() ? ' has-logo' : '';
    $wrapper_classes .= (true === get_theme_mod('display_title_and_tagline', true)) ? ' has-title-and-tagline' : '';
    $wrapper_classes .= has_nav_menu('primary') ? ' has-menu' : '';

    $blog_info    = get_bloginfo('name');
    $description  = get_bloginfo('description', 'display');
    $show_title   = (true === get_theme_mod('display_title_and_tagline', true));
    $header_class = $show_title ? 'site-title' : 'screen-reader-text';

    $custom_logo_id = get_theme_mod('custom_logo');
    $logo = wp_get_attachment_image_src($custom_logo_id, 'full');
    ?>
    <header id="masthead" class="header <?php echo esc_attr($wrapper_classes); ?>">
        <div class="headerOuter">
            <nav class="navbar navbar-expand-lg navbar-light">
                <div class="container">
                    <a class="navbar-brand2 resnavbar-brand2" href="<?php echo home_url(); ?>">
                        <?php
                        if (has_custom_logo()) {
                            echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="img-fluid">';
                        } else {
                            echo '<h1>' . get_bloginfo('name') . '</h1>';
                        }
                        ?>
                    </a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span>
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/menu.png' ?>">
                        </span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">&#x2715;</button>
                        <div class="row justify-content-center w-100 align-items-center header-inner">
                            <div class="col-md-3 col-xl-3">
                                <a class="navbar-brand2 resnavbar-brand1" href="<?php echo home_url(); ?>">
                                    <?php
                                    if (has_custom_logo()) {
                                        echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="img-fluid">';
                                    } else {
                                        echo '<h1>' . get_bloginfo('name') . '</h1>';
                                    }
                                    ?>
                                </a>
                            </div>
                            <div class="col-md-6 col-xl-6">
                                <?php
                                wp_nav_menu(
                                    array(
                                        'menu'            => 'primary',
                                        'theme_location'  => 'primary',
                                        'menu_class'      => 'menu-wrapper',
                                        'container_class' => 'primary-menu-container',
                                        'items_wrap'      => '<ul id="primary-menu-list" class="%2$s navbar-nav mb-2 mb-lg-0 justify-content-center">%3$s</ul>',
                                        'walker'          => new Shopify_Aid_Walker_Nav_Menu(),
                                        'fallback_cb'     => false,
                                    )
                                );
                                ?>
                            </div>
                            <div class="col-md-3 col-xl-3">
                                <div class="nav-right d-flex justify-content-end align-items-center">
                                    <div class="social-icon">
                                        <a href="#">
                                            <span class="icon icon-facebook"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon-twitter"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon-linkedin"></span>
                                        </a>
                                        <a href="#">
                                            <span class="icon icon-instagram"></span>
                                        </a>
                                    </div>
                                    <div class="search-icon">
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#searchModal"><span class="icon icon-search"></span></a>
                                    </div>
                                    <!-- Vertically centered modal -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header><!-- #masthead -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">