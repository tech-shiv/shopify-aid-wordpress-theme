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
<section class="trending">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 col-lg-6">
                        <div class="section-title d-flex align-items-center">
                            <img src="<?php echo get_template_directory_uri() . '/assets/images/bullet.png'; ?>">
                            <h2>Trending</h2>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav block-tab nav-pills mb-3 justify-content-end" id="pills-tab" role="tablist">
                            <?php
                            // Get all categories
                            $categories = get_categories();
                            foreach ($categories as $category) :
                                if ($category->name != 'Uncategorized') :
                                    
                        ?>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="<?php echo $category->name; ?>-tab" data-bs-toggle="pill"
                                    data-bs-target="#<?php echo $category->name; ?>" type="button" role="tab"
                                    aria-controls="<?php echo $category->name; ?>"
                                    aria-selected="true"><?php echo $category->name; ?> </button>
                            </li>
                            <?php
                                endif;
                            endforeach;
                        ?>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="tab-content" id="pills-tabContent">
                <?php
                        // Get all categories
                        $categories = get_categories();
                        foreach($categories as $category) :
                            if ($category->name != 'Uncategorized') :
                                $args = array(
                                    'post_type' => 'post',
                                    'posts_per_page' => 3,
                                    'category_name' => $category->name,
                                    'orderby' => 'date',
                                    'order' => 'DESC'
                                );
                        ?>
                <div class="tab-pane fade" id="<?php echo $category->name; ?>" role="tabpanel"
                    aria-labelledby="<?php echo $category->name; ?>-tab">
                    <div class="row">
                        <?php
                        $posts = get_posts($args);
                        foreach ($posts as $post) :
                            if (!empty(get_the_post_thumbnail_url($post->ID))) :
                        ?>
                        <div class="col-md-6 col-lg-6">
                            <div class="d-flex align-items-center terending-block">
                                <div class="flex-shrink-0">
                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                        <img src=" <?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="">
                                    </a>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <div class="comment d-flex">
                                        <div class="d-flex align-items-center  comment1">
                                            <div class="flex-shrink-0">
                                                <span class="icon icon-chatting"></span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php echo $post->comment_count; ?> Comments
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-center  comment1">
                                            <div class="flex-shrink-0">
                                                <span class="icon icon-user"></span>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <?php echo get_the_author_meta('display_name', $post->post_author); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <h5><?php echo $post->post_title; ?></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<!-- World -->
<Section class="trending world"></Section>


<?php
get_footer();