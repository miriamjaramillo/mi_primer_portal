<?php
/**
Template name:Homepage
 *
 * @package Fabthemes
 */

get_header(); ?>


<!-- Slider -->

<div id="home-slider" class="home-slider-section clearfix">
    <?php
        $slideid = ft_of_get_option('fabthemes_slider','2');
        $slide_entries = get_post_meta($slideid, 'fab_group_demo', true );
        echo '<ul class="slides">';
        foreach ( (array) $slide_entries as $key => $slide_entry ) {
        $img = $title = $desc = $caption = '';
        if ( isset( $slide_entry['title'] ) )
            $title = esc_html( $slide_entry['title'] );
        if ( isset( $slide_entry['description'] ) )
            $desc = wpautop( $slide_entry['description'] );
        if ( isset( $slide_entry['image'] ) ) {
            $img = esc_html( $slide_entry['image'] );
        }
        $link = isset( $slide_entry['link'] ) ? esc_html( $slide_entry['link'] ) : '';
     ?>

        <li>
            <a href="<?php echo $link;?>">    <img src="<?php echo aq_resize( $img, 1920, 600, true,true,true );?>" alt=""> </a>
            <div class="slide-caption">
                <div class="row">
                    <div class="column small-8">

                        <div class="animask"><h2><?php  echo $title; ?> </h2></div>
                        <div class="animask"><p><?php  echo $desc; ?> </p></div>

                    </div>
                </div>
            </div>
        </li>

    <?php  }
    echo '</ul>';
    ?>

</div>

<!-- Services -->

<div id="home-services" class="home-section">

<div class="row">
    <div class="column small-12">
        <div class="section-title">
            <h2> <?php _e('Our Services','fabthemes');?> </h2>
            <p> <?php _e('Listed are our main services','fabthemes');?> </p>
        </div>
    </div>
</div>


<div class="row">
    <?php
    $services_count = ft_of_get_option('fabthemes_service_count','3');
    $args = array( 'post_type' => 'fab_service', 'posts_per_page' => $services_count );
    $myposts = get_posts( $args );
    foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
        <div class="columns medium-4">
            <div class="home-service-item">
                <?php $service_icon = get_post_meta( $post->ID, 'fab_icon', true ); ?>
                <?php if($service_icon){ ?> <span> <i class="fa <?php echo $service_icon; ?>"></i></span> <?php } ?>
                <h3> <?php the_title(); ?> </h3>
                <p> <?php echo excerpt('20'); ?> </p>

            </div>
        </div>
    <?php endforeach;
    wp_reset_postdata();?>
</div>

</div>

<!-- CTA -->

<div id="home-cta" class="home-section">
<div class="row">
    <div class="column small-12">
        <div class="cta-content">
            <p> <?php echo ft_of_get_option('fabthemes_ctatext'); ?> </p>
            <?php $contact_page = ft_of_get_option('fabthemes_appointment');?>
            <a class=" button cta-button cbutton" href="<?php echo get_page_link($contact_page); ?>"><?php _e('Book Appointment',''); ?></a>
        </div>
    </div>
</div>
</div>

<!-- Staff -->

<div id="home-staff" class="home-section">

    <div class="row">
        <div class="column small-12">
            <div class="section-title">
                <h2> <?php _e('Our Staff','fabthemes');?> </h2>
                <p> <?php _e('Listed are our main staff members','fabthemes');?> </p>
            </div>
        </div>
    </div>

    <div class="row">
        <?php
        $staffcount = ft_of_get_option('fabthemes_staff_count');
        $args = array( 'post_type' => 'staff', 'posts_per_page' => $staffcount);
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="columns medium-3 small-6">
                <div class="home-staff-item">
                    <?php
                    $thumb = get_post_thumbnail_id();
                    $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                    $image = aq_resize( $img_url, 360, 400, true,true,true ); //resize & crop the image
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

<!-- Blog -->

<div id="home-news" class="home-section">
    <div class="row">
        <div class="columns medium-3">
            <div class="section-side-title">
                <h2> <?php _e('Latest News','fabthemes') ?></h2>
                <p> <?php _e('Checkout the latest articles on our Blog','fabthemes');?> </p>
                <?php $bloglink = ft_of_get_option('fabthemes_blog','1'); ?>
                <a href="<?php echo get_page_link($bloglink); ?>" class="button cbutton">Check the blog </a>
            </div>
        </div>
        <div class="columns medium-9">
            <div class="row">
                <?php
				$args = array( 'post_type' => 'post', 'posts_per_page' => 3);
				$myposts = get_posts( $args );
				foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
					<div class="columns medium-4">
						<div class="home-blog-item ">
						<?php
						$thumb = get_post_thumbnail_id();
						$img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
						$image = aq_resize( $img_url, 768, 400, true,true,true ); //resize & crop the image
						?>
						<?php if($image) : ?>
								<a href="<?php echo get_permalink($post->ID); ?>"> <img class="post-thumb" src="<?php echo $image ?>" /> </a>
						<?php endif; ?>

						<h3><a href="<?php echo get_permalink($post->ID); ?>"> <?php the_title(); ?></a> </h3>
						<div class="home-blog-meta"> <?php the_category( ', ' ); ?> </div>
						<p> <?php echo excerpt('20'); ?> </p>
						<a class="button cbutton" href="<?php echo get_permalink($post->ID); ?>"> Read More </a>
						</div>
					</div>
				<?php endforeach;
				wp_reset_postdata();?>
            </div>
        </div>

    </div>
</div>

<!-- Testimonials -->

<div id="home-testimonials" class="home-section">

    <div class="row">
        <div class="column small-12">
            <div class="section-title">
                <h2> <?php _e('What our Patients Say','fabthemes');?> </h2>
                <p> <?php _e('Testimonials from our patients','fabthemes');?> </p>
            </div>
        </div>
    </div>

    <div class="row"><div class="testim-slider">
        <?php
        $testimcount = ft_of_get_option('fabthemes_testimonial_count','');
        $args = array( 'post_type' => 'testimonial', 'posts_per_page' => $testimcount);
        $myposts = get_posts( $args );
        foreach ( $myposts as $post ) : setup_postdata( $post ); ?>
            <div class="columns medium-6">
                <div class="home-testim-item">
                <?php
                $thumb = get_post_thumbnail_id();
                $img_url = wp_get_attachment_url( $thumb,'full' ); //get full URL to image (use "large" or "medium" if the images too big)
                $image = aq_resize( $img_url, 80, 80, true,true,true ); //resize & crop the image
                ?>
                <?php if($image) : ?>
                        <a href="<?php echo get_permalink($post->ID); ?>"> <img class="testim-thumb" src="<?php echo $image ?>" /> </a>
                <?php endif; ?>

                <h3> <?php the_title(); ?> </h3>
                <p> <?php the_content(); ?> </p>
                </div>
            </div>
        <?php endforeach;
        wp_reset_postdata();?>

    </div></div>
</div>

<?php get_footer();
