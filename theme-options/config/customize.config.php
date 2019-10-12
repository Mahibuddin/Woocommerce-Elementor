<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// CUSTOMIZE SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options              = array();

// -----------------------------------------
// Customize Custom Color                   -
// -----------------------------------------
$options[]      = array(
  'name'        => 'hello_colors',
  'title'       => esc_html__('Hello Colors','hello'),
  'settings'    => array(
  
		array(
		  'name'          => 'hello_base_color',
		  'default'       => '#1e3585',
		  'value'       => '#1e3585',
		  'control'       => array(
			'label'       => esc_html__('Base Color','hello'),
			'type'        => 'color',
		  ),
		),
	
		array(
		  'name'          => 'hello_theme_color',
		  'default'       => '#ff9800',
		  'value'       => '#ff9800',
		  'control'       => array(
			'label'       => esc_html__('Theme Color','hello'),
			'type'        => 'color',
		  ),
		),
		
		array(
		  'name'          => 'hello_bg_color',
		  'default'       => '#f7f7f7',
		  'value'       => '#f7f7f7',
		  'control'       => array(
			'label'       => esc_html__('Background Color','hello'),
			'type'        => 'color',
		  ),
		),
		
		array(
		  'name'          => 'hello_base_bg_color',
		  'default'       => '#1e3585',
		  'value'       => '#1e3585',
		  'control'       => array(
			'label'       => esc_html__('Base Background Color','hello'),
			'type'        => 'color',
		  ),
		),
		
		array(
		  'name'          => 'hello_bg_overlay_color',
		  'default'       => 'rgba(30, 53, 133, 0.75)',
		  'value'       => 'rgba(30, 53, 133, 0.75)',
		  'control'       => array(
			'label'       => esc_html__('Background Overlay Color','hello'),
			'type'        => 'color',
		  ),
		),

	),
);


CSFramework_Customize::instance( $options );
