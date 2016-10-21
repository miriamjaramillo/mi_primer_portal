<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Fabthemes
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<div class="date-field"> <?php the_time('F j, Y'); ?> </div>
		<?php the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span> <i class="fa fa-user"></i> <?php the_author(); ?> </span>
			<span> <i class="fa fa-tag"></i> <?php the_category(', ') ?> </span>
			<span> <i class="fa fa-comment"></i> <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.</span>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
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

		<?php the_excerpt(); ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">

	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
