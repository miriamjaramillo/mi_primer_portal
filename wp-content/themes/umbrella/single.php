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
				<h1 class="page-title"> <span>  <?php _e('Blog','fabthemes'); ?> </span></h1>
		</div>
	</div>
</div>

<div class="row">
	<div class="columns medium-8">
		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content-single', get_post_format() );

				// If comments are open or we have at least one comment, load up the comment template.
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;

			endwhile; // End of the loop.
			?>

			</main><!-- #main -->
		</div><!-- #primary -->
	</div>
<div class="columns medium-4">
	<?php get_sidebar(); ?>
</div>
</div>
<?php get_footer();
