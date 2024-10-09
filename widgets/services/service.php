<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function hmd_elementor_services_template( $settings ) {

	$default_settings = [
		// Style
		'gap-list'       => 'gap-3',
		'items-bg'       => 'red',
		'items-radius'   => 'rounded-md',

		// Carousel
		'slidesPerView'  => 3,
		'slidesPerGroup' => 1,
		'direction'      => [
			'horizontal',
		],
		'loop'           => false,
		'spaceBetween'   => 15
	];

	$settings = wp_parse_args( $settings, $default_settings );

	$swiper_settings = [
		'slidesPerView'  => $settings['slidesPerView'],
		'slidesPerGroup' => $settings['slidesPerGroup'],
		'loop'           => false,
		'spaceBetween'   => $settings['spaceBetween'],
	];
	wp_localize_script( 'hmd-config-swiper-services', 'servicesSwiperSetting', $swiper_settings );
	?>
    <div data-slidesperview=3
         class="<?php echo esc_html__( $settings['carousel_switcher'] ? 'swiper sobhan' : 'flex', 'elementor-addon-hmd' ) ?> <?php echo esc_html__( $settings['gap_list'], 'elementor-addon-hmd' ) ?>">
		<?php echo $settings['carousel_switcher'] ? '<div class="swiper-wrapper">' : ''; ?>
		<?php
		foreach ( $settings['list_services'] as $index => $service ) {
			?>
            <div class="<?php echo esc_html__( $settings['carousel_switcher'] ? 'swiper-slide' : 'flex-1', 'elementor-addon-hmd' ) ?> flex flex-col hmd-padding <?php echo esc_html__( 'bg-[' . $settings['items_bg'] . '] ' . $settings['items_radius'], 'elementor-addon-hmd' ) ?>">
                <div class="block hmd-content-header">
					<?php echo '<img src="' . esc_url( $service['img_service']['url'] ) . '" class="width-icon" alt="">' ?>
                </div>
                <div class="hmd-content-body hmd-icon-services">
					<?php echo '<h4>' . __( $service['title_service'] ) . '</h4>' ?>
					<?php echo '<p>' . __( $service['content_service'] ) . '</p>' ?>
                </div>
            </div>
			<?php
		}
		?>
		<?php echo $settings['carousel_switcher'] ? '</div>' : ''; ?>

        <div class="swiper-pagination swiper-pagination1"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar"></div>

    </div>


    <br/>


    <!-- Slider main container -->
    <div class="swiper sobhan2">
        <!-- Additional required wrapper -->
        <div class="swiper-wrapper">
            <!-- Slides -->
			<?php
			foreach ( $settings['list_services'] as $index => $service ) {
				?>
                <div class="swiper-slide" style="width: 100%; height: 300px; background: red"><?php echo $index ?></div>
				<?php
			}
			?>
            ...
        </div>
        <!-- If we need pagination -->
        <div class="swiper-pagination swiper-pagination2"></div>

        <!-- If we need navigation buttons -->
        <div class="swiper-button-prev swiper-button-prev2"></div>
        <div class="swiper-button-next swiper-button-next2"></div>

        <!-- If we need scrollbar -->
        <div class="swiper-scrollbar swiper-scrollbar2"></div>
    </div>

	<?php
}