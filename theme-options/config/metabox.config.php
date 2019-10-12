<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();


// -----------------------------------------
// Post Metabox Options For Work Section        -
// -----------------------------------------

$options[]    = array(
  'id'        => 'tab_product_meta',
  'title'     => __('Extra Options','neuron'),
  'post_type' => 'product',
  'context'   => 'normal',
  'priority'  => 'default',
  'sections'  => array(

	  array(
		  'name'   => 'section_work_meta',
		  'fields' => array(


		//Tab Groups
		array(
			'id'              => 'top_tab',
			'type'            => 'group',
			'title'           => 'Top Tab',
			'button_title'    => 'Add New',
			'accordion_title' => 'Add New Tab',
			'fields'          => array(
				array(
					'id'    => 'title',
					'type'  => 'text',
					'title' => 'Title',
				),
				array(
					'id'    => 'content',
					'type'  => 'textarea',
					'title' => 'Content',
				),					
			),
		),

		//Videos Groups
		array(
			'id'              => 'videos',
			'type'            => 'group',
			'title'           => 'Videos',
			'button_title'    => 'Add New',
			'accordion_title' => 'Add New Video',
			'fields'          => array(
				array(
					'id'    => 'v_id',
					'type'  => 'text',
					'title' => 'Youtube Videos Id',
				)					
			),
		),

		array(
			'id'    => 'specifications',
			'type'  => 'textarea',
			'title' => 'Specifications',
		),
		array(
			'id'    => 'qa',
			'type'  => 'textarea',
			'title' => 'Community & QA',
		),
		array(
			'id'    => 'documents',
			'type'  => 'textarea',
			'title' => 'Documents',
		)

		
     ),

    ),

  ),
);



CSFramework_Metabox::instance( $options );