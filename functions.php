<?php

/**
 * Shopify Aid functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Shopify_Aid
 */


function shopify_aid_setup()
{
    // Add default posts and comments RSS feed links to head.
    add_theme_support('automatic-feed-links');

    /*
		* Let WordPress manage the document title.
		* By adding theme support, we declare that this theme does not use a
		* hard-coded <title> tag in the document head, and expect WordPress to
		* provide it for us.
		*/
    add_theme_support('title-tag');

    /*
		* Enable support for Post Thumbnails on posts and pages.
		*
		* @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		*/
    add_theme_support('post-thumbnails');

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus(
        array(
            'menu-1' => esc_html__('Primary', 'shopify-aid'),
        )
    );


    /*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
    add_theme_support(
        'html5',
        array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            'style',
            'script',
        )
    );


    // Set up the WordPress core custom background feature.
    add_theme_support(
        'custom-background',
        apply_filters(
            'shopify_aid_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
            )
        )
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support('customize-selective-refresh-widgets');

    /**
     * Add support for core custom logo.
     *
     * @link https://codex.wordpress.org/Theme_Logo
     */
    add_theme_support(
        'custom-logo',
        array(
            'height'      => 250,
            'width'       => 250,
            'flex-width'  => true,
            'flex-height' => true,
        )
    );
}

add_action('after_setup_theme', 'shopify_aid_setup');

class Shopify_Aid_Walker_Nav_Menu extends Walker_Nav_Menu
{

    // Displays start of an element. E.g '<li> Item Name'
    // @see Walker::start_el()
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $object = $item->object;
        $type = $item->type;
        $title = $item->title;
        $description = $item->description;
        $permalink = $item->url;

        $output .= "<li class='nav-item " .  implode(" ", $item->classes) . "'>";

        //Add SPAN if no Permalink
        if ($permalink && $permalink != '#') {
            $output .= '<a class="nav-link" href="' . $permalink . '">';
        } else {
            $output .= '<span>';
        }

        $output .= $title;

        if ($description != '' && $depth == 0) {
            $output .= '<small class="description">' . $description . '</small>';
        }

        if ($permalink && $permalink != '#') {
            $output .= '</a>';
        } else {
            $output .= '</span>';
        }
    }
}


/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function shopify_aid_widgets_init()
{
    register_sidebar(
        array(
            'name'          => esc_html__('Sidebar', 'shopify-aid'),
            'id'            => 'sidebar-1',
            'description'   => esc_html__('Add widgets here.', 'shopify-aid'),
            'before_widget' => '<section id="%1$s" class="widget %2$s">',
            'after_widget'  => '</section>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        )
    );
}
add_action('widgets_init', 'shopify_aid_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function shopify_aid_scripts()
{
    // Version of the theme
    $theme_version = wp_get_theme()->get('Version');

    // Enqueue styles
    wp_enqueue_style('shopify-aid-style', get_stylesheet_uri(), array(), $theme_version);
    wp_enqueue_style('shopify-aid-main', get_template_directory_uri() . '/assets/css/style.css', array('bootstrap-css'), $theme_version);
    wp_enqueue_style('shopify-aid-responsive', get_template_directory_uri() . '/assets/css/responsive.css');
    wp_enqueue_style('bootstrap-css', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), $theme_version);
    wp_enqueue_style('bootstrap-icons', 'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css');
    wp_enqueue_style('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.5.9/slick.min.css');
    wp_enqueue_style('aos-style', 'https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css');


    wp_enqueue_script('shopify-aid-navigation', get_template_directory_uri() . '/assets/js/navigation.js', array(), $theme_version, true);
    wp_enqueue_script('jQuery-min-js', get_template_directory_uri() . '/assets/js/jQuery.min.js', array(), '1.11.0', true);
    wp_enqueue_script('bootstrap-script', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', array(), '5.1.3', true);
    wp_enqueue_script('slick-slider', get_template_directory_uri() . '/assets/js/slick.min.js', array(), $theme_version, true);
    wp_enqueue_script('weblab-custom', get_template_directory_uri() . '/assets/js/script.js', array('slick-slider'), $theme_version, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'shopify_aid_scripts');

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function shopify_aid_body_classes($classes)
{
    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    // Adds a class of no-sidebar when there is no sidebar present.
    if (!is_active_sidebar('sidebar-1')) {
        $classes[] = 'no-sidebar';
    }

    return $classes;
}
add_filter('body_class', 'shopify_aid_body_classes');


/*
 * Set post views count using post meta
 */
function shopify_aid_get_post_views($postID)
{
    $countKey = 'post_views_count';
    $count = get_post_meta($postID, $countKey, true);
    if ($count == '') {
        $count = 0;
        delete_post_meta($postID, $countKey);
        add_post_meta($postID, $countKey, '0');
    } else {
        $count++;
        update_post_meta($postID, $countKey, $count);
    }
}
