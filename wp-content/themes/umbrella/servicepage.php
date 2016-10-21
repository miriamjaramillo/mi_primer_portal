<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 Template name: Service page
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
			    $services_count = "";
			    $args = array( 'post_type' => 'fab_service', 'posts_per_page' => -1);
			    $myposts = get_posts( $args );
			    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
			        <div class="columns medium-4">
			            <div class="home-service-item">
			                <?php $service_icon = get_post_meta( $post->ID, 'fab_icon', true ); ?>
			                <?php if($service_icon){ ?> <span> <i class="fa <?php echo $service_icon; ?>"></i></span> <?php } ?>
			                <h3> <?php the_title(); ?> </h3>
			                <p> <?php echo excerpt('20'); ?> </p>
							<a class="button cbutton" href="<?php the_permalink(); ?>"> More Info</a>
			            </div>
			        </div>
			    <?php endforeach;
			    wp_reset_postdata();?>
			</div>
		</div>
	</main>
</div>
<?php get_footer();
