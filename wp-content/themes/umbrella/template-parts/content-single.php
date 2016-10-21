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
		<?php	the_title( '<h1 class="entry-title">', '</h1>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<span> <i class="fa fa-user"></i> <?php the_author(); ?> </span>
			<span> <i class="fa fa-tag"></i> <?php the_category(', ') ?> </span>
			<span>  <i class="fa fa-comment"></i> <?php comments_number( 'no responses', 'one response', '% responses' ); ?>.</span>

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

		<?php
			the_content( sprintf(
				/* translators: %s: Name of current post. */
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'fabthemes' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );

			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'fabthemes' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
			<?php the_tags( 'Tags: ', ', ', '' ); ?>
	</footer><!-- .entry-footer -->

	<ul class="shareblock clearfix">
		<li class="twit" >  <a href="https://twitter.com/share?url=<?php echo esc_url( get_permalink() ) ?>&amp;text=<?php echo get_the_title() ?>" target="_blank"><i class="fa fa-twitter"></i></a></li>
		<li class="faceb"> <a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-facebook"></i></a></li>
		<li class="googl">  <a href="https://plus.google.com/share?url=<?php echo esc_url( get_permalink() ) ?>" target="_blank"><i class="fa fa-google-plus"></i></a></li>
	</ul>

</article><!-- #post-## -->
