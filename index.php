<?php



/**

 * The main template file

 * This is the most generic template file in a WordPress theme

 * and one of the two required files for a theme (the other being style.css).

 * It is used to display a page when nothing more specific matches a query.

 * E.g., it puts together the home page when no home.php file exists.

 *

 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/

 *

 * @package Shopify_Aid

 */



get_header();

?>



<main id="primary" class="site-main">



    <h1><?php bloginfo('name'); ?></h1>
    <h2><?php bloginfo('description'); ?></h2>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

            <h3><?php the_title(); ?></h3>

            <?php the_content(); ?>

        <?php endwhile; ?>

        <?php
        if (get_next_posts_link()) {
            next_posts_link();
        }
        ?>
        <?php
        if (get_previous_posts_link()) {
            previous_posts_link();
        }
        ?>

    <?php else : ?>

        <p>No posts found. :(</p>

    <?php endif; ?>



</main><!-- #main -->



<?php

get_sidebar();

get_footer();
