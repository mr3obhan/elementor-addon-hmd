<?php
function hmd_elementor_blog_template( $settings ) {
	$default_settings = [
		// General.
		'post_type'      => 'post',

		// Query.
		'first_items_per_page' => 1,
		'include'        => '',
		'taxonomies'     => '',
		'offset'         => '',
		'orderby'        => 'date',
		'order'          => 'DESC',
		'meta_key'       => '',
		'exclude'        => '',

//		// Visibility.
//		'parts_media'             => true,
//		'parts_title'             => true,
//		'parts_meta'              => true,
//		'parts_text'              => true,
//		'parts_btn'               => true,
//
//		// Design.
//		'img_size'                => 'medium',
//		'blog_design'             => 'default',
//		'blog_carousel_design'    => 'masonry',
//		'blog_columns'            => [ 'size' => 3 ],
//		'blog_columns_tablet'     => array( 'size' => '' ),
//		'blog_columns_mobile'     => array( 'size' => '' ),
//		'blog_spacing'            => woodmart_get_opt( 'blog_spacing' ),
//		'blog_spacing_tablet'     => woodmart_get_opt( 'blog_spacing_tablet', '' ),
//		'blog_spacing_mobile'     => woodmart_get_opt( 'blog_spacing_mobile', '' ),
//		'pagination'              => '',
//
//		// Carousel.
//		'speed'                   => '5000',
//		'slides_per_view'         => array( 'size' => 4 ),
//		'slides_per_view_tablet'  => array( 'size' => '' ),
//		'slides_per_view_mobile'  => array( 'size' => '' ),
//		'wrap'                    => '',
//		'autoplay'                => 'no',
//		'hide_pagination_control' => '',
//		'hide_prev_next_buttons'  => '',
//		'scroll_per_page'         => 'yes',
//
//		// Extra.
//		'lazy_loading'            => 'no',
//		'scroll_carousel_init'    => 'no',
//		'ajax_page'               => '',
//		'custom_sizes'            => apply_filters( 'woodmart_blog_shortcode_custom_sizes', false ),
//		'elementor'               => true,
	];

	$settings = wp_parse_args( $settings, $default_settings );

	// First Post
	$first_query_args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => $settings['first_items_per_page'],
	];

	if ( $settings['orderby'] ) {
		$first_query_args['orderby'] = $settings['orderby'];
	}

	if ( $settings['order'] ) {
		$first_query_args['order'] = $settings['order'];
	}

	$first_post = new WP_Query( $first_query_args );

	// Second Post
	$second_query_args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => '3',
		'offset'         => $settings['first_items_per_page']
	];
	$second_post       = new WP_Query( $second_query_args );

	// Second Post
	$query_args = [
		'post_type'      => 'post',
		'post_status'    => 'publish',
		'posts_per_page' => '2',
		'offset'         => '2'
	];
	$posts      = new WP_Query( $query_args );

	?>
    <div class="flex hmd-container-height hmd-gap">
		<?php
		// The Loop
		if ( $first_post->have_posts() ) :
			//$post_count = 0;
			while ( $first_post->have_posts() ) : $first_post->the_post();
				//$post_count ++;
				?>
				<?php //if ( $post_count == 1 ): ?>
                <article class="h-full bg-red-400 flex-1 overflow-hidden hmd-border-radius relative group">
                    <div class="absolute z-10 top-2.5 right-2.5 bg-white inline-block min-w-14 leading-none text-center">
                        <span class="block pb-0.5 pt-2"><?php echo get_the_date('d'); ?></span>
                        <span class="block pt-0.5 pb-2"><?php echo get_the_date('M'); ?></span>
                    </div>
                    <a class="block h-full w-full group-hover:scale-110 ease-in-out duration-700" href="<?php echo get_the_permalink(); ?>">
		                <?php the_post_thumbnail( 'large', [ 'class' => '!h-full !w-full object-cover' ] ); ?>
                    </a>
                    <div class="absolute bottom-0 p-3 inset-x-0 left-0 bg-gradient-to-b from-transparent via-[rgba(0,0,0,0.35)] to-[rgba(0,0,0,0.8)]">
	                    <?php the_category(); ?>
                        <h2>
                            <a href="<?php echo get_the_permalink(); ?>">
	                            <?php echo the_title(); ?>
                            </a>
                        </h2>
                    </div>
                </article>
				<?php //endif; ?>
			<?php endwhile;
		endif;

		// Restore original Post Data
		wp_reset_postdata();
		?>

        <div class="flex flex-1 flex-wrap flex-row hmd-gap">
			<?php
			// The Loop
			if ( $second_post->have_posts() ) :
				$post_count = 0;
				while ( $second_post->have_posts() ) : $second_post->the_post();
					$post_count ++;
					?>
					<?php if ( $post_count == 1 ): ?>

                        <article class="basis-full relative h-2/4 bg-red-200 relative overflow-hidden hmd-border-radius group">
                            <div class="absolute z-10 top-2.5 right-2.5 bg-white inline-block min-w-14 leading-none text-center">
                                <span class="block pb-0.5 pt-2"><?php echo get_the_date('d'); ?></span>
                                <span class="block pt-0.5 pb-2"><?php echo get_the_date('M'); ?></span>
                            </div>
                            <a class="block h-full w-full group-hover:scale-110 ease-in-out duration-700" href="<?php echo get_the_permalink(); ?>">
	                            <?php the_post_thumbnail( 'large', [ 'class' => '!h-full !w-full object-cover' ] ); ?>
                            </a>
                            <div class="absolute bottom-0 p-3 inset-x-0 left-0 bg-gradient-to-b from-transparent via-[rgba(0,0,0,0.35)] to-[rgba(0,0,0,0.8)]">
                                <?php the_category(); ?>
                                <h3>
                                    <a href="<?php echo get_the_permalink(); ?>">
		                                <?php echo the_title(); ?>
                                    </a>
                                </h3>
                                <p></p>
                            </div>
                        </article>

                    <?php else: ?>

                    <article class="flex-1 relative h-[48%] overflow-hidden bg-black hmd-border-radius group">
                        <div class="absolute z-10 top-2.5 right-2.5 bg-white inline-block min-w-14 leading-none text-center">
                            <span class="block pb-0.5 pt-2"><?php echo get_the_date('d'); ?></span>
                            <span class="block pt-0.5 pb-2"><?php echo get_the_date('M'); ?></span>
                        </div>
                        <a class="block h-full w-full group-hover:scale-110 ease-in-out duration-700" href="<?php echo get_the_permalink(); ?>">
		                    <?php the_post_thumbnail( 'large', [ 'class' => '!h-full !w-full object-cover' ] ); ?>
                        </a>
                        <div class="absolute bottom-0 p-3 inset-x-0 left-0 bg-gradient-to-b from-transparent via-[rgba(0,0,0,0.35)] to-[rgba(0,0,0,0.8)]">
	                        <?php the_category('' , '', ''); ?>
                            <h3>
                                <a href="<?php echo get_the_permalink(); ?>">
		                            <?php echo the_title(); ?>
                                </a>
                            </h3>
                            <p></p>
                        </div>
                    </article>

					<?php endif; ?>
				<?php endwhile;
			endif;

			// Restore original Post Data
			wp_reset_postdata();
			?>
        </div>

    </div>

	<?php
}