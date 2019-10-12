<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// TAXONOMY OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options     = array();

// -----------------------------------------
// Taxonomy Options                        -
// -----------------------------------------
$options[]   = array(
  'id'       => '_custom_taxonomy_options',
  'taxonomy' => 'taxonomy_name', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'section_1_text',
      'type'  => 'text',
      'title' => esc_html__('Text Field','hello'),
    ),

    array(
      'id'    => 'section_1_textarea',
      'type'  => 'textarea',
      'title' => esc_html__('Textarea Field','hello'),
    ),

  ),
);

$options[]   = array(
  'id'       => '_custom_taxonomy_options',
  'taxonomy' => 'another_taxonomy_name', // category, post_tag or your custom taxonomy name
  'fields'   => array(

    array(
      'id'    => 'section_1_text',
      'type'  => 'text',
      'title' => esc_html__('Text Field','hello'),
    ),

  ),
);

CSFramework_Taxonomy::instance( $options );
