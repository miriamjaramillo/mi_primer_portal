<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

get_header(); ?>

<div class="page-header">
	<div class="row">
		<div class="columns small-12">
				<?php the_archive_title( '<h1 class="page-title"><span> ', '</span></h1>' );	?>
		</div>
	</div>
</div>



<div class="row">
	<div class="columns medium-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			if ( have_posts() ) : ?>

				<?php
				/* Start the Loop */
				while ( have_posts() ) : the_post();

					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;

				the_posts_navigation();

			else :

				get_template_part( 'template-parts/content', 'none' );

			endif; ?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
	<div class="column medium-4">
	<?php get_sidebar(); ?>
	</div>
</div>
<?php get_footer();
