<?php



/**

 * The template for displaying the footer

 *

 * Contains the closing of the #content div and all content after.

 *

 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials

 *

 * @package Shopify_Aid

 */


$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>

<footer id="colophon" class="site-footer">
    <div class="container">
        <div class="row footer-inner">
            <div class="col-md-4">
                <div class="footer-desc">
                    <?php if (has_custom_logo()) : ?>
                        <div class="site-logo logo">
                            <a href="<?php echo home_url(); ?>">
                                <?php
                                if (has_custom_logo()) {
                                    echo '<img src="' . esc_url($logo[0]) . '" alt="' . get_bloginfo('name') . '" class="img-fluid">';
                                } else {
                                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                                }
                                ?>
                            </a>
                        </div>
                    <?php else : ?>
                        <?php if (get_bloginfo('name') && get_theme_mod('display_title_and_tagline', true)) : ?>
                            <?php if (is_front_page() && !is_paged()) : ?>
                                <?php bloginfo('name'); ?>
                            <?php else : ?>
                                <a href="<?php echo esc_url(home_url('/')); ?>"><?php bloginfo('name'); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>
                    <p>
                        This is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet
                        aenean sollicitudin lorem quis
                    </p>
                    <div class="social-icon">
                        <a href="#"> <span class="icon icon-facebook"></span></a>
                        <a href="#"> <span class="icon icon-twitter"></span></a>
                        <a href="#"> <span class="icon icon-linkedin"></span></a>
                        <a href="#"> <span class="icon icon-instagram"></span></a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-heading">
                    <h3>
                        Tags
                    </h3>
                    <div class="footer-tag">
                        <a href="#">design</a>
                        <a href="#">Business</a>
                        <a href="#">recipes</a>
                        <a href="#">lifehacks </a>
                        <a href="#">sports</a>
                        <a href="#">tech</a>
                        <a href="#">travel</a>
                        <a href="#">health</a>
                        <a href="#">entertainment</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer-heading">
                    <h3>
                        Popular Post
                    </h3>
                    <div class="footer-post">
                        <div class="d-flex align-items-center terending-block">
                            <div class="flex-shrink-0">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/trending.png'; ?>">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Big Tech's battle for billions leaves lots of collateral damage </h5>
                            </div>
                        </div>
                    </div>
                    <div class="footer-post">
                        <div class="d-flex align-items-center terending-block">
                            <div class="flex-shrink-0">
                                <img src="<?php echo get_template_directory_uri() . '/assets/images/trending.png'; ?>">
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h5>Big Tech's battle for billions leaves lots of collateral damage </h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row align-items-center">
            <div class="col-md-12 col-lg-6">
                <div class="copy-right">
                    <p>&copy; <?php echo date('Y'); ?> <a href="<?php echo home_url(); ?>"><?php echo get_bloginfo('name'); ?></a> All Rights Reserved.</p>
                </div>
            </div>
            <div class="col-md-12 col-lg-6 text-end">
                <div class="copy-right">
                    <a href="#scroll-top"> <img src="<?php echo get_template_directory_uri() . '/assets/images/top-arrow.png'; ?>"></a>
                </div>
            </div>
        </div>
    </div>
</footer>

</main><!-- #main -->
</div><!-- #primary -->
</div><!-- #content -->

<!-- Search Modal -->
<div class="modal fade search-bar" id="searchModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="input-group">
                    <?php get_search_form(); ?>
                    <!-- <input type="text" class="form-control" placeholder="Search our products" aria-label="Recipient's username" aria-describedby="button-addon2"> -->
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<!-- WP Footer -->
<?php wp_footer(); ?>

</html>