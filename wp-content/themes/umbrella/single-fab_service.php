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

					<div class="columns medium-4">
						<div class="service-list">
							<?php
							$service_posts = get_posts( array(
							    'post_type' => 'fab_service',
							) );
							echo '<ul>';
							foreach ($service_posts as $service_post) { ?>
							<li>
								<?php $service_icon = get_post_meta($service_post->ID, 'fab_icon', true ); ?>
								<?php if($service_icon){ ?> <span> <i class="fa <?php echo $service_icon; ?>"></i></span> <?php } ?>
								<a href="<?php echo esc_url( get_permalink($service_post->ID) ); ?>"><?php echo $service_post->post_title; ?></a>
							</li>
							<?php }
							echo '</ul>';
							?>
						</div>
					</div>

					<div class="columns medium-8">
						<header class="entry-header">
							<?php	the_title( '<h1 class="entry-title">', '</h1>' ); ?>
						</header><!-- .entry-header -->

						<div class="entry-content">

							<?php
							$thumb = get_post_thumbnail_id();
							$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
							$image = aq_resize( $img_url, 768, 400, true,true,true ); //resize & crop the image
							?>
							<?php if($image) : ?>
									<img class="post-thumb" src="<?php echo $image ?>" />
							<?php endif; ?>


							<?php
								the_content( sprintf(
									/* translators: %s: Name of current post. */
									wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fabthemes' ), array( 'span' => array( 'class' => array() ) ) ),
									the_title( '<span class="screen-reader-text">"', '"</span>', false )
								) );
							?>
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
