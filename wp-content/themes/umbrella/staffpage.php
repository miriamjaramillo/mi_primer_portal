<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 Template name: Staff page
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

get_header(); ?>

<div class="page-header">
	<div class="row">
		<div class="columns small-12">
				<h1 class="page-title"> <span>  <?php the_title(); ?> </span></h1>
		</div>
	</div>
</div>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
		<div id="page-staff">
			<div class="row">
				<?php
				$args = array( 'post_type' => 'staff', 'posts_per_page' => -1);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="columns medium-3 small-6">
						<div class="home-staff-item">
							<?php
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 300, 400, true,true,true ); //resize & crop the image
							?>
							<?php if($image) : ?>
								<div class="staff-pic">
									<a href="<?php echo get_permalink($post->ID); ?>"> <img class="post-thumb" src="<?php echo $image ?>" /> </a>
								</div>

							<?php endif; ?>
							<div class="staff-info">
								<h3> <?php the_title(); ?> </h3>
								<?php $staff_title = get_post_meta( $post->ID, 'fab_job_title', true ); ?>
								<?php if($staff_title){ ?> <div class='staff-title'>  <?php echo $staff_title; ?> </div> <?php } ?>

								<div> </div>
							</div>
						</div>
					</div>
				<?php endforeach;
				wp_reset_postdata();?>
			</div>
		</div>
	</main>
</div>
<?php get_footer();
