<?php
get_header();
shopify_aid_get_post_views(get_the_ID());

while (have_posts()) :
    the_post();
?>
<!-- Post Thumbnail with Title -->
<section class="small-banner single-banner">
    <div class="container-fluid">
        <div class="small-inner"
            style="background: url('<?php echo get_the_post_thumbnail_url(); ?>')no-repeat; background-size:cover">
            <h1><?php the_title(); ?></h1>
        </div>
    </div>
</section>

<!-- Post Content -->
<section class="morbie-felis">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12">
                <div class="morbie-outer">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Related Posts -->
<section class="spotlight related-post">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="section-title-2">
                    <h2>Related Posts <span></span></h2>
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.<br> Lorem Ipsum has
                        been the industry's standard dummy.</p>
                    <?php
                        $related_posts = get_posts(array(
                            // Posts only has thumbnails
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 4,
                            'post__not_in' => array(get_the_ID()),
                            'orderby' => 'rand',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'category',
                                    'field' => 'term_id',
                                    'terms' => wp_get_post_categories(get_the_ID(), array('fields' => 'ids'))
                                )
                            )

                        ));
                        ?>
                    <div class="section-btn">
                        <a class="customm-btn" href="<?php echo get_permalink(get_option('page_for_posts')); ?>">View
                            All</a>
                    </div>
                </div>
            </div>
            <?php
                foreach ($related_posts as $post) :
                    if (!empty(get_the_post_thumbnail_url($post->ID))) :
                ?>
            <div class="col-md-6 col-lg-4">
                <div class="spotlight-box">
                    <div class="spotlight-img">
                        <a href="<?php echo get_permalink($post->ID); ?>">
                            <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>" alt="" class="img-fluid">
                        </a>
                    </div>
                    <div class="box-date">
                        <a href=""><?php echo get_the_date(__('M d, Y'), $post->ID); ?></a>
                        <a href=""><?php echo ucfirst(get_the_author_meta('display_name', $post->post_author)); ?></a>
                    </div>
                    <!-- Limit Title Characters -->
                    <a href="<?php echo get_permalink($post->ID); ?>">
                        <h3><?php echo wp_trim_words($post->post_title, 5, '...'); ?></h3>
                    </a>
                    <p><?php echo wp_trim_words($post->post_content, 20); ?></p>
                </div>
            </div>

            <?php
                    endif;
                endforeach;
                ?>
        </div>
    </div>
</section>


<?php
endwhile;
// $post_id=get_the_ID(); // $post_title=get_the_title(); // $post_content=get_the_content(); // $post_excerpt=get_the_excerpt(); // $post_thumbnail=get_the_post_thumbnail_url(); // $post_author=get_the_author(); // $post_date=get_the_date(); // $post_category=get_the_category(); // $post_comments=get_comments_number(); // $post_tags=get_the_tags(); // $post_url=get_permalink(); // $post_views=getPostViews($post_id); // $post_likes=get_post_meta($post_id, '_post_likes' , true); // $post_shares=get_post_meta($post_id, '_post_shares' , true); // $post_shares=$post_shares ? $post_shares : 0; // $post_likes=$post_likes ? $post_likes : 0; // $post_views=$post_views ? $post_views : 0; // $post_category=$post_category[0]->name;
// $post_category_url = get_category_link($post_category);
// $post_category_id = $post_category[0]->term_id;

get_footer();