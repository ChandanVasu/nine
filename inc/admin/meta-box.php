<?php
Redux_Metaboxes::set_box(
	$opt_name,
	array(
		'id'         => 'opt-metaboxes',
		'title'      => esc_html__( 'Metabox Options', 'nine-theme' ),
		'post_types' => array( 'page', 'post' ),
		'position'   => 'normal', // normal, advanced, side.
		'priority'   => 'high',   // high, core, default, low.
		'sections'   => array(
			array(
				'title'  => esc_html__( 'Basic Field', 'nine-theme' ),
				'id'     => 'opt-basic-fields',
				'desc'   => esc_html__( 'Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at:', 'nine-theme' ) . '  <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>',
				'icon'   => 'el-icon-cogs',
				'fields' => array(
					array(
						'id'       => 'opt-checkbox',
						'type'     => 'checkbox',
						'title'    => esc_html__( 'Checkbox', 'nine-theme' ),
						'subtitle' => esc_html__( 'Basic Checkbox field.', 'nine-theme' ),
						'default'  => true,
					),
					array(
						'id'       => 'switch-on',
						'type'     => 'switch',
						'title'    => esc_html__( 'Switch On', 'nine-theme' ),
						'subtitle' => esc_html__( 'Look, it\'s on!', 'nine-theme' ),
						'default'  => 1,
					),
				),
			),
			array(
				'title'      => esc_html__( 'Text Field', 'nine-theme' ),
				'desc'       => esc_html__( 'Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at:', 'nine-theme' ) . '  <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>',
				'icon'       => 'el-icon-cog',
				'id'         => 'opt-text-fields',
				'subsection' => true,
				'fields'     => array(
					array(
						'title' => esc_html__( 'Text Field', 'nine-theme' ),
						'id'    => 'opt-text',
						'type'  => 'text',
					),
				),
			),
			array(
				'title'  => esc_html__( 'Color Field', 'nine-theme' ),
				'desc'   => esc_html__( 'Redux Framework was created with the developer in mind. It allows for any theme developer to have an advanced theme panel with most of the features a developer would need. For more information check out the Github repo at:', 'nine-theme' ) . '  <a href="https://github.com/ReduxFramework/Redux-Framework">https://github.com/ReduxFramework/Redux-Framework</a>',
				'icon'   => 'el-icon-pencil',
				'id'     => 'color-section',
				'fields' => array(
					array(
						'id'       => 'opt-color',
						'type'     => 'color',
						'title'    => esc_html__( 'Color Field', 'nine-theme' ),
						'default'  => '#333333',
						'required' => array( 'opt-layout', '=', 'on' ),
					),
				),
			),
		),
	)
);

// Metabox sidebar.
Redux_Metaboxes::set_box(
	$opt_name,
	array(
		'id'         => 'opt-metaboxes-3',
		'post_types' => array( 'page', 'post' ),
		'position'   => 'side', // normal, advanced, side.
		'priority'   => 'high', // high, core, default, low.
		'sections'   => array(
			array(
				'icon_class' => 'icon-large',
				'icon'       => 'el-icon-home',
				'fields'     => array(
					array(
						'id'      => 'sidebar',
						'title'   => esc_html__( 'Sidebar', 'nine-theme' ),
						'desc'    => esc_html__( 'Please select the sidebar you would like to display on this page. Note: You must first create the sidebar under Appearance > Widgets.', 'nine-theme' ),
						'type'    => 'select',
						'data'    => 'sidebars',
						'default' => 'None',
					),
				),
			),
		),
	)
);