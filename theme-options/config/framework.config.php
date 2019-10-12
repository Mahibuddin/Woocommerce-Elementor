<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();
// ----------------------------------------


// option section for options header  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'header',
  'title'       => esc_html__('Header','neuron'),
  'icon'        => 'fa fa-star',
  'sections'      => array(
		 // Top Bar Contact  Info
		
		array(
			'name'     => 'Social_section',
			'title'    => esc_html__('Top Bar Contact Info','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(
			
				// Top Bar Contact section On / Off
				array(
				  'id'    => 'top_bar_contact_switch',
				  'type'  => 'switcher',
				  'title' => __('Top Bar Contact Section','neuron'),
				  'label' => __('Do you want to active it?','neuron'),
				),
				array(
				  'id'             => 'social_info',
				  'type'           => 'select',
				  'title'          => 'Change To Left',
				  'options'        => array(
					'value'		   	=> 'Select A Option',
					'contact'      	=> 'Top Contact Area',
					'social'       	=> 'Top Social Area',
				  ),
				  'default'          => 'Top Contact Info',
				  'dependency' => array( 'top_bar_contact_switch', '==', 'true' ) // dependency rule
				),
				//Top Bar Contact Group
				array(
				  'type'    => 'heading',
				  'content' =>  esc_html__('Top Bar Contact ','neuron'),
				  'dependency' => array( 'top_bar_contact_switch', '==', 'true' ) // dependency rule
				),
				
				array(
					'id'              => 'top_left_group',
					'type'            => 'group',
					'title'           => 'Header Top Contact Section',
					'button_title'    => 'Add New',
					'accordion_title' => 'Add New Field',
					'fields'          => array(
						array(
							'id'    => 'contact_icon',
							'type'  => 'icon',
							'title' => 'Contact Icon',
						),
						array(
							'id'    => 'contact_text',
							'type'  => 'text',
							'title' => 'Contact Text',
						),					
					),
					'dependency' => array( 'top_bar_contact_switch', '==', 'true' ) // dependency rule
				),
				//Top Bar Contact Group end
			
				//Top Bar Social Group start
				array(
				  'type'    => 'heading',
				  'content' =>  esc_html__('Top Bar Social Area','neuron'),
				  'dependency' => array( 'top_bar_contact_switch', '==', 'true' ) // dependency rule
				),
				array(
					'id'              => 'top_right_group',
					'type'            => 'group',
					'title'           => 'Header Top Social Section',
					'button_title'    => 'Add New',
					'accordion_title' => 'Add New Field',
					'fields'          => array(
						array(
							'id'    => 'social_icon',
							'type'  => 'icon',
							'title' => 'Social Icon',
						),
						array(
							'id'    => 'social_link',
							'type'  => 'text',
							'title' => 'Social Link',
						),					
					),
					'dependency' => array( 'top_bar_contact_switch', '==', 'true' ) // dependency rule
				),
				//Top Bar Social Group end
			),
		),

	),
);


// option section for options homepage  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'homepage',
  'title'       => esc_html__('Homepage','neuron'),
  'icon'        => 'fa fa-home',
  'sections'      => array(

		 // Homepage Feature Section
		array(
			'name'     => 'feature_sec',
			'title'    => esc_html__('Feature Section','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(

				// Homepage Feature section On / Off
				array(
				  'id'    => 'home_feat_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('Homepage Feature section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),

				array(
				  'id'    => 'feature_title',
				  'type'  => 'text',
				  'title' => __('Feature Title','neuron'),
				  'default'  => 'Welcome to the Neuron Finance',
				  'desc'  => 'Type Feature Title',
				  'dependency' => array( 'home_feat_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'feature_sub_title',
				  'type'  => 'textarea',
				  'title' => __('Feature Sub Title','neuron'),
				  'default' => 'Interactively simplify 24/7 markets through 24/7 best practices. Authoritatively foster cutting-edge manufactured products and distinctive.',
				  'desc'  => 'Type Feature Sub Title',
				  'dependency' => array( 'home_feat_sec_switch', '==', 'true' ) // dependency rule
				),
			),
		),

		// Homepage Service Section
		array(
			'name'     => 'service_sec',
			'title'    => esc_html__('Service Section','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(

				// Homepage Service section On / Off
				array(
				  'id'    => 'home_ser_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('Homepage Service section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),

				array(
				  'id'    => 'service_title',
				  'type'  => 'text',
				  'title' => __('Service Title','neuron'),
				  'default' => 'We Provide Huge Range of Services',
				  'desc'  => 'Type Service Title',
				  'dependency' => array( 'home_ser_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'service_sub_title',
				  'type'  => 'textarea',
				  'title' => __('Service Sub Title','neuron'),
				  'default' => 'Holisticly transform excellent systems rather than collaborative leadership. Credibly pursue compelling outside the box.',
				  'desc'  => 'Type Service Sub Title',
				  'dependency' => array( 'home_ser_sec_switch', '==', 'true' ) // dependency rule
				),
			),
		),

		// Homepage Experience Section
		array(
			'name'     => 'experience_sec',
			'title'    => esc_html__('Experience Section','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(

				// Homepage Experience section On / Off
				array(
				  'id'    => 'home_exp_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('Homepage Experience section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),

				array(
				  'id'    => 'experience_title',
				  'type'  => 'text',
				  'title' => __('Experience Title','neuron'),
				  'default' => 'A Finance Agency Crafting Beautiful & Engaging Online Experiences',
				  'desc'  => 'Type Experience Title',
				  'dependency' => array( 'home_exp_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'experience_content',
				  'type'  => 'textarea',
				  'title' => __('Experience Content','neuron'),
				  'desc'  => 'Type Experience Content',
				  'dependency' => array( 'home_exp_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'experience_img',
				  'type'  => 'image',
				  'title' => __('Experience Image','neuron'),
				  'desc'  => 'Set Experience Content Image',
				  'dependency' => array( 'home_exp_sec_switch', '==', 'true' ) // dependency rule
				),
			),
		),

	),
);



// option section for options aboutpage  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'aboutpage',
  'title'       => esc_html__('About Us Page','neuron'),
  'icon'        => 'fa fa-user',
  'sections'      => array(

	  		// Aboutpage Experience Section
			array(
				'name'     => 'abt_exp_sec',
				'title'    => esc_html__('About Experience Section','neuron'),
				'icon'     => 'fa fa-clone',
				'fields'   => array(

					// Aboutpage Experience section On / Off
					array(
					  'id'    => 'abt_exp_sec_switch',
					  'type'  => 'switcher',
					  'title' => __('Aboutpage Experience section Enable or Disable','neuron'),
					  'label' => __('Do you want to Enable it?','neuron'),
					  'default'  => true,
					),

					array(
					  'id'    => 'abt_exp_title',
					  'type'  => 'text',
					  'title' => __('About Experience Title','neuron'),
					  'default' => 'A Finance Agency Crafting Beautiful & Engaging Online Experiences',
					  'desc'  => 'Type Experience Title',
					  'dependency' => array( 'abt_exp_sec_switch', '==', 'true' ) // dependency rule
					),
					array(
					  'id'    => 'abt_exp_content',
					  'type'  => 'textarea',
					  'title' => __('About Experience Content','neuron'),
					  'desc'  => 'Type Experience Content',
					  'dependency' => array( 'abt_exp_sec_switch', '==', 'true' ) // dependency rule
					),
					array(
					  'id'    => 'abt_exp_img',
					  'type'  => 'image',
					  'title' => __('About Experience Image','neuron'),
					  'desc'  => 'Set Experience Content Image',
					  'dependency' => array( 'abt_exp_sec_switch', '==', 'true' ) // dependency rule
					),
				),
			),

			// Aboutpage Feature Section
			array(
				'name'     => 'abt_fet_sec',
				'title'    => esc_html__('About Feature Section','neuron'),
				'icon'     => 'fa fa-clone',
				'fields'   => array(
				// About Page Feature section On / Off
				array(
				  'id'    => 'abt_feat_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('About Page Feature section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),
			),
		),

		// Aboutpage Accordion Section
		array(
			'name'     => 'abt_acc_sec',
			'title'    => esc_html__('About Accordion Section','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(

				// Aboutpage Accordion section On / Off
				array(
				  'id'    => 'abt_acc_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('Aboutpage Accordion section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),

				array(
					'id'              => 'accordion_group',
					'type'            => 'group',
					'title'           => 'Aboutpage Accordion Group',
					'button_title'    => 'Add New',
					'accordion_title' => 'Add New Field',
					'fields'          => array(
						array(
						  'id'    => 'abt_acc_title',
						  'type'  => 'text',
						  'title' => __('About Accordion Title','neuron'),
						  'default' => 'Collaboratively utilize resource sucking sources before sticky.',
						  'desc'  => 'Type Accordion Title',
						),
						array(
						  'id'    => 'abt_acc_content',
						  'type'  => 'textarea',
						  'title' => __('About Accordion Content','neuron'),
						  'desc'  => 'Type Accordion Content',
						),					
					),
					'dependency' => array( 'abt_acc_sec_switch', '==', 'true' ) // dependency rule
				),

				array(
				  'id'    => 'acc_sec_title',
				  'type'  => 'text',
				  'title' => __('Accordion Section Title','neuron'),
				  'default' => 'Know More About Us',
				  'desc'  => 'Type Accordion Section Title',
				  'dependency' => array( 'abt_acc_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'acc_sec_content',
				  'type'  => 'textarea',
				  'title' => __('Accordion Section Content','neuron'),
				  'desc'  => 'Type Accordion Section Content',
				  'dependency' => array( 'abt_acc_sec_switch', '==', 'true' ) // dependency rule
				),
			),
		),
	),
);


// ----------------------------------------
// option section for options global options  -
// ----------------------------------------
$options[]      = array(
  'name'        => 'settings',
  'title'       => esc_html__('Global Options','neuron'),
  'icon'        => 'fa fa-cubes',
  'sections'      => array(

  				// Blogpage Title
		array(
			'name'     => 'blog_sec',
			'title'    => esc_html__('Blog Section','neuron'),
			'icon'     => 'fa fa-clone',
			'fields'   => array(

				// Blogpage section On / Off
				array(
				  'id'    => 'blog_sec_switch',
				  'type'  => 'switcher',
				  'title' => __('Blogpage Blog section Enable or Disable','neuron'),
				  'label' => __('Do you want to Enable it?','neuron'),
				  'default'  => true,
				),

				array(
				  'id'    => 'blog_title',
				  'type'  => 'text',
				  'title' => __('Blog Title','neuron'),
				  'default' => 'News Blog',
				  'desc'  => 'Type Blog Title',
				  'dependency' => array( 'blog_sec_switch', '==', 'true' ) // dependency rule
				),
				array(
				  'id'    => 'blog_sub_title',
				  'type'  => 'textarea',
				  'title' => __('Blog Sub Title','neuron'),
				  'desc'  => 'Type Blog Sub Title',
				  'dependency' => array( 'blog_sec_switch', '==', 'true' ) // dependency rule
				),
			),
		),

  		// Brand area section
		array(
		  'name'     => 'brand_section',
		  'title'    => esc_html__('Brand Logo Area','neuron'),
		  'icon'     => 'fa fa-clone',
		  'fields'   => array(
				array(
					  'type'    => 'heading',
					  'content' => esc_html__('Brand Logo Add Here','neuron'),
				),
				array(
				  'id'    => 'logos',
				  'type'  => 'gallery',
				  'title' =>esc_html__( 'Brand Logos','neuron'),
				),
			),
		),

		 // Logo & Favicon
		array(
		  'name'     => 'media_section',
		  'title'    => esc_html__('Site Logo & Favicon','neuron'),
		  'icon'     => 'fa fa-clone',
		  'fields'   => array(
				array(
					  'type'    => 'heading',
					  'content' => esc_html__('Favicon Add Here','neuron'),
				),
				array(
				  'id'    => 'neuron_fav_icon',
				  'type'  => 'upload',
				  'title' =>esc_html__( 'Fav Icon','neuron'),
				),
				array(
					  'type'    => 'heading',
					  'content' => esc_html__('Logo Add Here','neuron'),
				),
				array(
				  'id'    => 'neuron_logo',
				  'type'  => 'image',
				  'title' => esc_html__('Logo','neuron'),
				),
			),
		),
		

		// pre-loader
		array(
		  'name'     => 'preloader_option',
		  'title'    => esc_html__('Site Preloader','neuron'),
		  'icon'     => 'fa fa-clone',
		  'fields'   => array(
				//preload
				array(
				  'type'    => 'heading',
				  'content' => __('Site Pre-loader','neuron'),				
				),
				array(
				  'id'    => '_switcher_preloader',
				  'type'  => 'switcher',
				  'title' => __('Pre-loader','neuron'),
				  'label' => __('Yes, Please do it.','neuron'),
				),
			),
		),	
		
	),
);


// ----------------------------------------
// a option section for options footer section  -
// ----------------------------------------
$options[] = array(
	'name' => 'copy',
	'title' => esc_html__('Footer','neuron'),
	'icon' => 'fa fa-copyright',
	  'sections' => array(
    // Copyright section
		array(
		  'name'     => 'copy_section',
		  'title'    => esc_html__('Copyright Area','neuron'),
		  'icon'     => 'fa fa-clone',
		  'fields'   => array(
				array(
				  'type'    => 'heading',
				  'content' => esc_html__('Copyright Section','neuron'),
				),
				array(
				  'id'    => 'copyright_title',
				  'type'  => 'text',
				  'title' => esc_html__('Copyright Title','neuron'),
				),
			)
		),	
	),
);

// ------------------------------
// backup                       -
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => esc_html__('Backup','neuron'),
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => esc_html__('You can save your current options. Download a Backup and Import.','neuron'),
    ),
    array(
      'type'    => 'backup',
    ),
  )
);

CSFramework::instance(  $options );