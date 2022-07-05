<?php
/*
Template Name: Blog Page
*/

get_header();
?>

<?php
$banner_image = get_field('banner_image');
?>
<section class="small-banner">
	<div class="container-fluid">
		<div class="row justify-content-center">
			<div class="col-md-12">
				<?php if(!empty($banner_image)){ ?>
					<div class="small-inner">
						<img src="<?php echo $banner_image; ?>" class="img-fluid">
					</div>
				<?php } ?>
			</div>
		</div>
	</div>
</section>

<section class="about">
	<div class="container">
		<div class="trending-innner">
		<?php 
			$args = array(
				'post_type' => 'post',
				'post_status' => 'publish',
				'orderby' => 'date',
				'order' => 'DESC',
				'posts_per_page' => 1,
			);
			
			$l_post = new WP_Query($args);
			
			if($l_post->have_posts()){
		?>
			<div class="row align-items-center">
			<?php
				while($l_post->have_posts()){
					$l_post->the_post();
					$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
			?>
				<div class="col-md-12 col-lg-6">
					<?php if(!empty($image)){ ?>
						<div class="about-img">
							<img src="<?php echo $image; ?>" class="img-fluid">
						</div>
					<?php } else { ?>
						<div class="about-img">
							<img src="https://www.shopifyaid.com/wp-content/uploads/2022/07/slide-3.jpg" class="img-fluid">
						</div>
					<?php } ?>
				</div>
				<div class="col-md-12 col-lg-6">
					<div class="about-text">
						<h2><?php the_title(); ?></h2>
						<div class="description"><?php the_excerpt(); ?></div>
						<div class="about-btn">
							<a class="customm-btn" href="<?php the_permalink(); ?>">Read More</a>
						</div>
					</div>
				</div>
			<?php
				}
				wp_reset_postdata();
			?>
			</div>
		<?php } ?>
		</div>
	</div>
</section>


<?php
	$terms = get_terms( array(
		'taxonomy' => 'category',
		'hide_empty' => true,
	) );
	
	foreach($terms as $term) {
		$cat_slug = $term->slug;
		$cat_desc = $term->description;
?>
<section class="spotlight <?php echo $cat_slug; ?>">
	<div class="container">
		<div class="row justify-content-center">
				<div class="col-md-12">
					<div class="section-title-2">
						<h2>
							<?php echo $term->name; ?>
							<span></span>
						</h2>
						<?php if(!empty($cat_desc)){ ?>
							<p><?php echo $cat_desc; ?></p>
						<?php } ?>
						<div class="section-btn">
							<a class="customm-btn" href="category/<?php echo $term->slug; ?>">View All</a>
						</div>
					</div>
				</div>
				<?php
					$args = array(
						'post_type' => 'post',
						'post_status' => 'publish',
						'orderby' => 'date',
						'order' => 'DESC',
						'posts_per_page' => 3,
						'tax_query' => array(
							array(
								'taxonomy' => 'category',
								'field'     => 'slug',
								'terms'    => $cat_slug,
							),
						),
					);
					
					$p_post = new WP_Query($args);
					
					if($p_post->have_posts()){
						while($p_post->have_posts()){
							$p_post->the_post();
							
							$image = get_the_post_thumbnail_url(get_the_ID(), 'full');
							$author_id = get_the_author_meta( 'ID' );
							$post_date = get_the_date( 'F j, Y' );
							$post_date_link = get_the_date( 'Y/m/d' );
					?>
						<div class="col-md-12 col-lg-4">
							<div class="spotlight-box">
								<?php if(!empty($image)){ ?>
									<div class="spotlight-img">
										<img src="<?php echo $image; ?>" class="img-fluid">
									</div>
								<?php } else { ?>
									<div class="spotlight-img">
										<img src="https://www.shopifyaid.com/wp-content/uploads/2022/07/slide-3.jpg" class="img-fluid">
									</div>
								<?php } ?>
								<div class="box-date">
									<a href="<?php echo $post_date_link; ?>"><?php echo $post_date; ?></a>
									<a href="<?php echo esc_url( get_author_posts_url( $author_id ) ); ?>"><?php the_author(); ?></a>
								</div>
								<h3><?php the_title(); ?></h3>
								<div class="description"><?php the_excerpt(); ?></div>
							</div>
						</div>
					<?php
						}
					wp_reset_postdata();
					}		
			?>
		</div>
	</div>
</section>
<?php } ?>

<?php
	get_footer();
?>