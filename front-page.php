<?php
get_header();

?>

<!-- Hero Slider -->
<Section class="banner">
    <div class="container">
        <div class="justify-content-center banner-slider">
            <?php wp_get_recent_posts(array('numberposts' => 10));
            foreach (get_posts(array('numberposts' => 10)) as $post) :
                if (!empty(get_the_post_thumbnail_url($post->ID))) :
            ?>
                    <div class="inner-banner">
                        <div class="banner-img">
                            <a href="<?php echo get_permalink($post->ID); ?>">
                                <img src=" <?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                            </a>
                        </div>
                        <div class="banner-text">
                            <a href="<?php echo get_category_link(get_the_category($post->ID)[0]); ?>">
                                <h3><?php echo get_the_category($post->ID)[0]->name; ?></h3>
                            </a>
                            <a href="<?php echo get_permalink($post->ID); ?>">
                                <h1><?php echo $post->post_title; ?></h1>
                            </a>
                            <div class="comment d-flex">
                                <div class="d-flex align-items-center comment1">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-chatting"></span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <?php echo $post->comment_count; ?> Comments
                                    </div>
                                </div>
                                <div class="d-flex align-items-center comment1">
                                    <div class="flex-shrink-0">
                                        <span class="icon icon-user"></span>
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endif;
            endforeach;
            ?>
        </div>
    </div>
</Section>

<!-- Trending -->
<Section class="trending"></Section>

<!-- World -->
<Section class="trending world"></Section>


<?php
get_footer();
