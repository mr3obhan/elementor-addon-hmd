<?php

class HMD_Posts extends \Elementor\Widget_Base {

	public function get_name() {
		return 'hmd_post_blog';
	}

	public function get_title() {
		return esc_html__( 'مطالب داغ', 'elementor-addon-hmd' );
	}

	public function get_icon() {
		return 'eicon-code';
	}

	public function get_categories() {
		return [ 'hmd-widgets-category' ];
	}

	public function get_keywords() {
		return [ 'hello', 'world' ];
	}

	public function get_script_depends() {
		return [ 'tailwindCss' ];
	}

	protected function register_controls() {

		// Content Tab Start

		$this->start_controls_section(
			'section_title',
			[
				'label' => esc_html__( 'Grid Post', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'       => esc_html__( 'Order by', 'elementor-addon-hmd' ),
				'description' => esc_html__( 'Select order type. If "Meta value" or "Meta value Number" is chosen then meta key is required.', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => '',
				'options'     => array(
					''               => '',
					'date'           => esc_html__( 'Date', 'elementor-addon-hmd' ),
					'id'             => esc_html__( 'ID', 'elementor-addon-hmd' ),
					'author'         => esc_html__( 'Author', 'elementor-addon-hmd' ),
					'title'          => esc_html__( 'Title', 'elementor-addon-hmd' ),
					'modified'       => esc_html__( 'Last modified date', 'elementor-addon-hmd' ),
					'comment_count'  => esc_html__( 'Number of comments', 'elementor-addon-hmd' ),
					'menu_order'     => esc_html__( 'Menu order', 'elementor-addon-hmd' ),
					'meta_value'     => esc_html__( 'Meta value', 'elementor-addon-hmd' ),
					'meta_value_num' => esc_html__( 'Meta value number', 'elementor-addon-hmd' ),
					'rand'           => esc_html__( 'Random order', 'elementor-addon-hmd' ),
				),
			]
		);

		$this->add_control(
			'order',
			[
				'label'       => esc_html__( 'Sort order', 'woodmart' ),
				'description' => 'Designates the ascending or descending order. More at <a href="http://codex.wordpress.org/Class_Reference/WP_Query#Order_.26_Orderby_Parameters" target="_blank">WordPress codex page</a>.',
				'type'        => \Elementor\Controls_Manager::SELECT,
				'default'     => 'DESC',
				'options'     => array(
					'DESC' => esc_html__( 'Descending', 'woodmart' ),
					'ASC'  => esc_html__( 'Ascending', 'woodmart' ),
				),
			]
		);

		$this->add_control(
			'first_items_per_page',
			[
				'label'       => esc_html__( 'Items per page', 'elementor-addon-hmd' ),
				'description' => esc_html__( 'Number of items to show per page.', 'elementor-addon-hmd' ),
				'default'     => 1,
				'placeholder' => '1',
				'type'        => \Elementor\Controls_Manager::NUMBER,
			]
		);

		$this->add_control(
			'setting',
			[
				'label' => esc_html__( 'Selecetd', 'elementor-addon-hmd' ),
				'type'  => \Elementor\Controls_Manager::TEXTAREA
			]
		);

		$this->end_controls_section();

		// Content Tab End

		// Style Tab Start

		$this->start_controls_section(
			'section_title_style',
			[
				'label' => esc_html__( 'شبکه نوشته ها', 'elementor-addon-hmd' ),
				'tab'   => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'height_container',
			[
				'label'      => esc_html__( 'ارتفاع شبکه نوشته ها', 'elementor-addon-hmd' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'default'     => [
					'unit' => 'px',
					'height' => 400
				],
				'range'      => [
					'px' => [
						'min'  => 400,
						'max'  => 1000,
						'step' => 1,
					],
				],
				'placeholder' => '400px',
				'selectors'  => [
					'{{WRAPPER}} .hmd-container-height' => 'height:  {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'border_radios',
			[
				'label'      => esc_html__( 'میزان نرمی مطالب', 'elementor-addon-hmd' ),
				'type'       => \Elementor\Controls_Manager::SLIDER,
				'size_units' => [ 'px', '%', 'em', 'rem', 'custom' ],
				'selectors'  => [
					'{{WRAPPER}} .hmd-border-radius' => 'border-radius:  {{SIZE}}{{UNIT}};',
				],
			]
		);

		$this->add_control(
			'hmd_gap',
			[
				'label'       => esc_html__( 'فاصله مابین نوشته ها', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::GAPS,
				'size_units'  => [ 'px', '%', 'em', 'rem', 'vw', 'custom' ],
				'default'     => [
					'unit' => 'px',
				],
				'placeholder' => [
					'row'    => '0',
					'column' => '0',
				],
				'selectors'   => [
					'{{WRAPPER}} .hmd-gap' => 'gap: {{ROW}}{{UNIT}} {{COLUMN}}{{UNIT}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'first_title_typography',
				'label'    => esc_html__( 'عنوان نوشته اصلی', 'elementor-addon-hmd' ),
				'selector' => '{{WRAPPER}} article h2',
			]
		);

		$this->add_control(
			'title_color',
			[
				'label'       => esc_html__( 'رنگ عنوان نوشته ها', 'elementor-addon-hmd' ),
				'type'        => \Elementor\Controls_Manager::COLOR,
				'selectors'   => [
					'{{WRAPPER}} article h2' => 'color: {{VALUE}}',
					'{{WRAPPER}} article h3' => 'color: {{VALUE}}',
				],
			]
		);

		$this->add_group_control(
			\Elementor\Group_Control_Typography::get_type(),
			[
				'name'     => 'second_title_typography',
				'selector' => '{{WRAPPER}} article h3',
			]
		);

		$this->end_controls_section();

		// Style Tab End

	}

	protected function render() {
		hmd_elementor_blog_template( $this->get_settings_for_display() );
	}

	protected function content_template() {
		?>

		<?php
	}

}