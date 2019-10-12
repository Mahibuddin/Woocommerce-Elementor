<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// SHORTCODE GENERATOR OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options       = array();

// -----------------------------------------
// Basic Shortcode Examples                -
// -----------------------------------------
$options[]     = array(
  'title'      => esc_html__('Basic Shortcode Examples','hello'),
  'shortcodes' => array(

    // begin: shortcode
    array(
      'name'      => 'cs_shortcode_1',
      'title'     => esc_html__('Basic Shortcode 1','hello'),
      'fields'    => array(

        // shortcode option field
        array(
          'id'    => 'icon',
          'type'  => 'icon',
          'title' => esc_html__('Icon','hello'),
        ),

        array(
          'id'    => 'image',
          'type'  => 'image',
          'title' => esc_html__('Image','hello'),
        ),

        // shortcode option field
        array(
          'id'    => 'gallery',
          'type'  => 'gallery',
          'title' => esc_html__('Gallery','hello'),
        ),

        // shortcode option field
        array(
          'id'    => 'title',
          'type'  => 'text',
          'title' => esc_html__('Title','hello'),
        ),
		
        // shortcode option field
        array(
          'id'    => 'title',
          'type'  => 'text',
          'title' => esc_html__('Title','hello'),
        ),

        // shortcode content
        array(
          'id'    => 'content',
          'type'  => 'textarea',
          'title' => esc_html__('Content','hello'),
          'help'  => 'Lorem Ipsum Dollar.',
        )

      ),
    ),
    // end: shortcode
),
);

CSFramework_Shortcode_Manager::instance( $options );
