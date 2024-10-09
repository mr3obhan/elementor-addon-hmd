<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class HMD_Service extends \Elementor\Widget_Base {
	public function get_name() {
		return 'hmd_services';
	}

	public function get_title() {
		return esc_html__( 'خدمات ها', 'elementor-addon-hmd' );
	}

	public function get_icon() {
		return 'hmd-icon-services';
	}

	public function get_categories() {
		return [ 'hmd-widgets-category' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	public function get_script_depends() {
		return [ 'tailwindCss', 'hmd-config-swiper-services' ];
	}

	public function get_style_depends() {
		return [ 'hmd-swiper' ];
	}

	protected function register_controls() {

		// Content Tab Start
		$this->start_controls_section(
			'content_section',
			[
				'label' => esc_html__( 'List Content', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		/* Start repeater */
		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'img_service',
			[
				'label'   => esc_html__( 'Image', 'elementor-addon-hmd' ),
				'type'    => \Elementor\Controls_Manager::MEDIA,
				'default' => [
					'url' => \Elementor\Utils::get_placeholder_image_src(),
				],
			]
		);

		$repeater->add_control(
			'title_service',
			[
				'label'       => esc_html__( 'Text', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'List Item', 'elementor-addon-hmd' ),
				'default'     => esc_html__( 'List Item', 'elementor-addon-hmd' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'content_service',
			[
				'label'       => esc_html__( 'Content', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::TEXTAREA,
				'placeholder' => esc_html__( 'Content Item', 'elementor-addon-hmd' ),
				'default'     => esc_html__( 'Content Item', 'elementor-addon-hmd' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'button_service',
			[
				'label'       => esc_html__( 'Button', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::TEXT,
				'placeholder' => esc_html__( 'Button Item', 'elementor-addon-hmd' ),
				'default'     => esc_html__( 'Button Item', 'elementor-addon-hmd' ),
				'label_block' => true,
				'dynamic'     => [
					'active' => true,
				],
			]
		);

		$repeater->add_control(
			'link',
			[
				'label'   => esc_html__( 'Link', 'elementor-addon-hmd' ),
				'type'    => \Elementor\Controls_Manager::URL,
				'dynamic' => [
					'active' => true,
				],
			]
		);
		/* End repeater */

		// Add List Repeater
		$this->add_control(
			'list_services',
			[
				'label'       => esc_html__( 'List Items', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::REPEATER,
				'fields'      => $repeater->get_controls(),           /* Use our repeater */
				'default'     => [
					[
						'text' => esc_html__( 'List Item #1', 'elementor-addon-hmd' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #2', 'elementor-addon-hmd' ),
						'link' => '',
					],
					[
						'text' => esc_html__( 'List Item #3', 'elementor-addon-hmd' ),
						'link' => '',
					],
				],
				'title_field' => '{{{ text }}}',
			]
		);

		$this->end_controls_section();


		// Start Tab Style
		$this->start_controls_section(
			'style_section',
			[
				'label' => esc_html__( 'List Style', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'carousel_switcher',
			[
				'label'       => esc_html__( 'فعال کردن کروسل', 'elementor-addon-hmd' ),
				'description' => '',
				'default'      => 'no',
				'type'        => \Elementor\Controls_Manager::SWITCHER,
				'return_value' => 'yes',
			]
		);

		$this->add_control(
			'gap_list',
			[
				'label'       => esc_html__( 'فاصله بین ایتم ها', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'gap-3',
				'options'     => [
					'gap-0' => esc_html__( '0px', 'elementor-addon-hmd' ),
					'gap-2' => esc_html__( '8px', 'elementor-addon-hmd' ),
					'gap-3' => esc_html__( '12px', 'elementor-addon-hmd' ),
					'gap-4' => esc_html__( '16px', 'elementor-addon-hmd' ),
					'gap-6' => esc_html__( '24px', 'elementor-addon-hmd' ),
				],
			]
		);

		$this->add_control(
			'items_bg',
			[
				'label'       => esc_html__( 'رنگ پس زمینه', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::COLOR,
			]
		);

		$this->add_control(
			'items_radius',
			[
				'label'       => esc_html__( 'نرمی دور آیتم ها', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'rounded',
				'options'     => [
					'rounded'     => esc_html__( '4px', 'elementor-addon-hmd' ),
					'rounded-md'  => esc_html__( '6px', 'elementor-addon-hmd' ),
					'rounded-lg'  => esc_html__( '8px', 'elementor-addon-hmd' ),
					'rounded-xl'  => esc_html__( '12px', 'elementor-addon-hmd' ),
					'rounded-2xl' => esc_html__( '16px', 'elementor-addon-hmd' ),
				],
			]
		);

		$this->add_control(
			'items_padding',
			[
				'label'      => esc_html__( 'فاصله داخلی دسته بندی', 'elementor-addon-hmd' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default'    => [
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 0,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => true,
				],
				'selectors'  => [
					'{{WRAPPER}} .hmd-padding' => 'padding : {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Carousel Setting
		$this->start_controls_section(
			'carousel_section',
			[
				'label' => esc_html__( 'Carousel Setting', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
				'condition'   => [
                        'carousel_switcher' => 'yes',
				],
			]
		);

		$this->end_controls_section();

		// Style Icons
		$this->start_controls_section(
			'icons_style',
			[
				'label' => esc_html__( 'Icons Style', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'width_icons',
			[
				'label'       => esc_html__( 'عرض آیکون', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::SLIDER,
				'default'     => [
					'unit' => 'px',
				],
				'size_units'  => [ 'px', '%', 'em', 'rem', 'custom' ],
				'range'       => [
					'px' => [
						'min' => 0,
						'max' => 500,
					],
				],
				'selectors'   => [
					'{{WRAPPER}} img.width-icon' => 'width: {{SIZE}}{{UNIT}}',
				],
			]
		);

		$this->add_control(
			'padding_radius_category',
			[
				'label'      => esc_html__( 'نرمی آیکون', 'elementor-addon-hmd' ),
				'type'       => \Elementor\Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default'    => [
					'top'      => 0,
					'right'    => 0,
					'bottom'   => 0,
					'left'     => 0,
					'unit'     => 'px',
					'isLinked' => true,
				],
				'selectors'  => [
					'{{WRAPPER}} img.width-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
				],
			]
		);

		$this->end_controls_section();

		// Start Tab Style Content
		$this->start_controls_section(
			'content_style',
			[
				'label' => esc_html__( 'Content Style', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'title_typography',
				'label'    => esc_html__( 'عنوان خدمات', 'elementor-addon-hmd' ),
				'selector' => '{{WRAPPER}} .hmd-content-body h4',
			]
		);

		$this->add_control(
			'color_title',
			[
				'label'       => esc_html__( 'رنگ عنوان', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .hmd-content-body h4' => 'color : {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'content_typography',
				'label'    => esc_html__( 'متن خدمات', 'elementor-addon-hmd' ),
				'selector' => '{{WRAPPER}} .hmd-content-body p',
			]
		);

		$this->add_control(
			'color_content',
			[
				'label'       => esc_html__( 'رنگ متن', 'elementor-addon-hmd' ),
				'description' => '',
				'type'        => \Elementor\Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} .hmd-content-body p' => 'color : {{VALUE}}',
				],
			]
		);

		$this->end_controls_section();
		// End Tab Style

	}

	protected function render() {
		hmd_elementor_services_template( $this->get_settings_for_display() );
	}

	protected function content_template() {
		?>
        <#
        if (! settings.list_services.length ) {
        return;
        }
        #>

        <div class="flex {{{settings.gap_list}}}">
            <# _.each(settings.list_services, function(item, index) { #>
            <div class="flex flex-col flex-1 hmd-padding bg-[{{{ settings.items_bg }}}] {{{ settings.items_radius }}}">
                <div class="block hmd-content-header">
                    <img src="{{{ item.img_service.url  }}}" class="width-icon"/>
                </div>
                <div class="hmd-content-body hmd-icon-services">
                    <h4>{{{ item.title_service }}}</h4>
                    <p>{{{ item.content_service }}}</p>
                </div>
            </div>
            <# } ); #>
        </div>
		<?php
	}

}