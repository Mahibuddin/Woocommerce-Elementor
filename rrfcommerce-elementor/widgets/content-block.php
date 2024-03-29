<?php

class RRFCommerce_contentBlock_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'rrfcommerce-contentBlock';
	}


	public function get_title() {
		return __( 'RRFCommerce Content Block', 'plugin-name' );
	}


	public function get_icon() {
		return 'eicon-editor-code';
	}


	public function get_categories() {
		return [ 'general' ];
	}


	protected function _register_controls() {

		$this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'plugin-name' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
            'theme',
            [
                'label' => __( 'Box Theme', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SELECT,
                'default' => '1',
                'options' => [
                    '1'  => __( 'Theme 1', 'plugin-domain' ),
                    '2' => __( 'Theme 2', 'plugin-domain' ),
                ],
            ]
        );


		$this->add_control(
            'title',
            [
                'label' => __( 'Title', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Girl Lookbook 2019',
                'show_label' => true,
            ]
        );

 
        $this->add_control(
            'block_content', [
                'label' => __( 'Block Content', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => __( 'Default Content' , 'plugin-domain' ),
                'show_label' => true,
            ]
        );


        $this->add_control(
            'image', [
                'label' => __( 'Image', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'show_label' => true,
            ]
        );


        $this->add_control(
            'icon', [
                'label' => __( 'Icon', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => __( 'eicon-chevron-double-right' , 'plugin-domain' ),
                'show_label' => true,
            ]
        );
 
        $this->add_control(
            'link', [
                'label' => __( 'Link', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::URL,
                'show_label' => true,
            ]
        );
        
 
        $this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();

        if ($settings['link']['is_external'] == true) {
            $target = '_blank';
        }else{
            $target = '_self';
        }

        echo '<div class="content-box content-box-theme-'.$settings['theme'].'">
            <div class="content-box-bg" style="background-image:url('.wp_get_attachment_image_url($settings['image']['id'], 'large').')"></div>
            <div class="content-box-content">
                '.wpautop($settings['block_content']).'
                <h6>'.$settings['title'].'</h6>
                <a href="'.$settings['link']['url'].'" target="'.$target.'"> <i class="'.$settings['icon'].'"></i> </a>
            </div>
        </div>';

	}

}