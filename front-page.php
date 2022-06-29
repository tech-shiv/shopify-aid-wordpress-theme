<?php
get_header();

?>
<article class="content px-3 py-5 p-md-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php
                if (have_posts()) :
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                endif;
                ?>
            </div>
        </div>
    </div>
</article>

<?php
get_footer();
?>