<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Fabthemes
 */

get_header(); ?>

<div class="page-header">
	<div class="row">
		<div class="columns small-12">
				<h1 class="page-title"> <span> <?php the_title(); ?></span></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="columns medium-12">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();?>


			<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<div class="row">
					<div class="columns medium-4 small-4">
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
					</div>
					<div class="columns medium-8 small-8">
						<header class="entry-header">
							<?php	the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">
							<div class="row">
								<div class="column medium-4">
									<ul class="staff-single-details">
									<?php $staff_title = get_post_meta($post->ID, 'fab_job_title', true );
										if ($staff_title) {
											echo '<li>';
											echo '<span> Position: </span>';
											echo $staff_title;
											echo '</li>';
										 }
									?>
									<?php $staff_experience = get_post_meta($post->ID, 'fab_job_experience', true );
										if ($staff_experience) {
											echo '<li>';
											echo '<span> Experience: </span>';
											echo $staff_experience;
											echo '</li>';
										 }
									?>
									<?php $staff_twitter = get_post_meta($post->ID, 'fab_job_twitter', true );
										if ($staff_twitter) {
											echo '<li><i class="fa fa-twitter"></i> ';
											echo '<a href=" '.$staff_twitter.' "> Twitter </a>';
											echo '</li>';
										 }
									?>
									<?php $staff_facebook = get_post_meta($post->ID, 'fab_job_facebook', true );
										if ($staff_facebook) {
											echo '<li><i class="fa fa-facebook"></i> ';
											echo '<a href=" '.$staff_facebook.' "> Facebook </a>';
											echo '</li>';
										 }
									?>
									<?php $staff_gplus = get_post_meta($post->ID, 'fab_job_gplus', true );
										if ($staff_facebook) {
											echo '<li><i class="fa fa-google-plus"></i> ';
											echo '<a href=" '.$staff_gplus.' "> Google plus</a>';
											echo '</li>';
										 }
									?>
									<?php $staff_linkedin = get_post_meta($post->ID, 'fab_job_linkedin', true );
										if ($staff_linkedin) {
											echo '<li><i class="fa fa-linkedin"></i> ';
											echo '<a href=" '.$staff_linkedin.' "> Linkedin </a>';
											echo '</li>';
										 }
									?>
									</ul>

								</div>
								<div class="column medium-8">
									<?php $staff_description = get_post_meta($post->ID, 'fab_job_description', true );
										if ($staff_description) {
											 echo $staff_description;
										 }
									?>
								</div>
							</div>


						</div><!-- .entry-content -->



					</div>


				</div>
			</article><!-- #post-## -->


		<?php	endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
</div>
<?php get_footer();
