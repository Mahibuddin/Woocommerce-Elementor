<?php

class RRFCommerce_slider_Widget extends \Elementor\Widget_Base {


	public function get_name() {
		return 'rrfcommerce-slider';
	}


	public function get_title() {
		return __( 'RRFCommerce Slider', 'plugin-name' );
	}


	public function get_icon() {
		return 'eicon-post-slider';
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



		$repeater = new \Elementor\Repeater();

		$repeater->add_control(
			'slide_title', [
				'label' => __( 'Title', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slider Title' , 'plugin-domain' ),
				'label_block' => true,
			]
		);

		$repeater->add_control(
			'slide_content', [
				'label' => __( 'Content', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::WYSIWYG,
				'default' => __( 'Slider Content' , 'plugin-domain' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'slide_desc',
			[
				'label' => __( 'Description', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::TEXT,
				'default' => __( 'Slider Description' , 'plugin-domain' ),
				'show_label' => true,
			]
		);

		$repeater->add_control(
			'slide_image',
			[
				'label' => __( 'Image', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::MEDIA ,
				'show_label' => true,
			]
		);

		$this->add_control(
			'slides',
			[
				'label' => __( 'Slides', 'plugin-domain' ),
				'type' => \Elementor\Controls_Manager::REPEATER,
				'fields' => $repeater->get_controls(),
				'default' => [
					[
						'list_title' => __( 'Slide #1', 'plugin-domain' ),
						'list_content' => __( 'Slides Content', 'plugin-domain' ),
					],
				]
			]
		);

		$this->end_controls_section();




		$this->start_controls_section(
            'setting_section',
            [
                'label' => __( 'Slider Settings', 'plugin-name' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
 
        $this->add_control(
            'fade',
            [
                'label' => __( 'Fade effecct?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => __( 'Loop?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
        $this->add_control(
            'arrows',
            [
                'label' => __( 'Show arrows?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'dots',
            [
                'label' => __( 'Show dots?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'your-plugin' ),
                'label_off' => __( 'Hide', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'autoplay',
            [
                'label' => __( 'Autoplay?', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'your-plugin' ),
                'label_off' => __( 'No', 'your-plugin' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );
 
        $this->add_control(
            'autoplay_time',
            [
                'label' => __( 'Autoplay Time', 'plugin-domain' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '5000',
                'condition' => [
                    'autoplay' => 'yes',
                ],
            ]
        );
 
        $this->end_controls_section();

	}


	protected function render() {

		$settings = $this->get_settings_for_display();


		if ($settings['slides'] ) {
			$dynamic_id = rand(78676, 967698);
			if(count($settings['slides']) > 1){
				if($settings['fade'] == 'yes') {
                    $fade = 'true';
                } else {
                    $fade = 'false';
                }
                if($settings['arrows'] == 'yes') {
                    $arrows = 'true';
                } else {
                    $arrows = 'false';
                }
                if($settings['dots'] == 'yes') {
                    $dots = 'true';
                } else {
                    $dots = 'false';
                }
                if($settings['autoplay'] == 'yes') {
                    $autoplay = 'true';
                } else {
                    $autoplay = 'false';
                }
                if($settings['loop'] == 'yes') {
                    $loop = 'true';
                } else {
                    $loop = 'false';
                }
				echo '<script>
					jQuery(document).ready(function($){
						$("#slide-'.$dynamic_id.'").slick({

							arrows: '.$arrows.',
                            prevArrow: "<i class=\'fa fa-angle-left\'></i>",
                            nextArrow: "<i class=\'fa fa-angle-right\'></i>",
                            dots: '.$dots.',
                            fade: '.$fade.',
                            autoplay: '.$autoplay.',
                            loop: '.$loop.',';
 
                            if($autoplay == 'true') {
                                echo 'autoplaySpeed: '.$settings['autoplay_time'].'';
                            }
                           
 
                            echo '
						});
					});
				</script>';
			}
			echo '<div id="slide-'.$dynamic_id.'" class="slides">';
				foreach ($settings['slides'] as $slide ) {
					echo '<div class="single-slide-item" style="background-image:url('.wp_get_attachment_image_url($slide['slide_image']['id'], 'large').')">
						<div class="row">
							<div class="col my-auto">
								'.wpautop($slide['slide_content']).'
							</div>
						</div>
						<div class="slide-info">
							<h4>'.$slide['slide_title'].'</h4>
							'.$slide['slide_desc'].'
						</div>
					</div>';
				}
			echo '</div>';
		}

	}

}






if ( class_exists( 'WooCommerce' ) ) {


    function avocado_product_list( ) {

        $args = wp_parse_args( array(
            'post_type'   => 'product',
            'numberposts' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ) );
    
        $query_query = get_posts( $args );
    
        $dropdown_array = array();
        if ( $query_query ) {
            foreach ( $query_query as $query ) {
                $dropdown_array[ $query->ID ] = $query->post_title;
            }
        }
    
        return $dropdown_array;
    }


    function avocado_product_cat_list( ) {
        $elements = get_terms( 'product_cat', array('hide_empty' => false) ); // hide_empty false mane holo ei product category te jodi product nao thake, tao jate category ta show kore...
        $product_cat_array = array();  // Ekhane array bole deya holo...

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_cat');
                $product_cat_array[ $info->term_id ] = $info->name; // Ekhane cat ID & Name show korbe...
            }
        }
    
        return $product_cat_array;  // array ta ekhane return kora kholo...
    }




class Avocado_Categories_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'avocado-categories';
        }
        
        public function get_title() {
            return __( 'Avocado Cagegories', 'ppm-quickstart' );
        }

        public function get_icon() {
            return 'fa fa-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {


            
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Configuration', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'Select Categories', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list()
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Columns', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '4'  => __( '4 Columns', 'plugin-domain' ),
                        '3'  => __( '3 Columns', 'plugin-domain' ),
                        '2'  => __( '2 Columns', 'plugin-domain' ),
                        '1'  => __( '1 Columns', 'plugin-domain' ),
                    ],
                ]
            );

            $this->add_control(
                'bg',
                [
                    'label' => __( 'Image as background?', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no'
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();

            if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3';
            } else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4';
            } else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6';
            } else {
                $columns_markup = 'col';
            }

            if(!empty($settings['cat_ids'])) {
                $html = '<div class="row">';
                foreach($settings['cat_ids'] as $cat) {
                    $thumb_id = get_term_meta( $cat, 'thumbnail_id', true );
                    $term_img = wp_get_attachment_image_url(  $thumb_id, 'medium' );
                    $info = get_term($cat, 'product_cat');
                    $html .= '<div class="'.$columns_markup.' single-category-item">';

                        if(!empty($thumb_id)) {
                            if($settings['bg'] == 'yes') {
                                $html .= '<div class="cat-img cat-img-bg" style="background-image:url('.$term_img.')"></div>';
                            } else {
                                $html .='
                                <div class="row cat-img">
                                    <div class="col text-center">
                                        <img src="'.$term_img.'" alt=""/>
                                    </div>
                                </div>';
                            }
                            
                        } else {
                            $html .= '<div class="cat-no-thumb"><p>No thumbnail</p></div>';
                        }
                        

                        $html .='

                        <h3>'.$info->name.'</h3>
                        '.$info->description.'
                    </div>';
                }
                $html .= '</div>';
            } else {
                $html = '<div class="alert alert-warning"><p>Please select categories.</p></div>';
            }

            echo $html;

        }

    }


    class Avocado_ProductCarousel_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'avocado-product-carousel';
        }
        
        public function get_title() {
            return __( 'Avocado ProducrCarousel', 'ppm-quickstart' );
        }

        public function get_icon() {
            return 'fa fa-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {

            
            
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Configuration', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'from',
                [
                    'label' => __( 'Products From', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'select'  => __( 'Select Products', 'plugin-domain' ),
                        'category'  => __( 'Select Categories', 'plugin-domain' )
                    ],
                    'default' => 'select'
                ]
            );


            $this->add_control(
                'p_ids',
                [
                    'label' => __( 'And/Or Select products', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_list(),
                    'condition' => [
                        'from' => 'select',
                    ],
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'And/Or Categories', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list(),
                    'condition' => [
                        'from' => 'category',
                    ],
                ]
            );

            $this->add_control(
                'nav',
                [
                    'label' => __( 'Enable navigation?', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes'
                ]
            );

            $this->add_control(
                'dots',
                [
                    'label' => __( 'Enable dots?', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'no'
                ]
            );

            $this->add_control(
                'autoplay',
                [
                    'label' => __( 'Enable autoplay?', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SWITCHER,
                    'default' => 'yes'
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();

            if($settings['from'] == 'category') {
                $q = new WP_Query( array(
                    'posts_per_page' => 10, 
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $settings['cat_ids'],
                        )
                    ),
                ));
            } else {
                $q = new WP_Query( array(
                    'posts_per_page' => 10, 
                    'post_type' => 'product',
                    'post__in' => $settings['p_ids'],
                ));
            }

            

            //$q = new WP_Combine_Queries( $args );

            $rand = rand(897987,9879877);

            if($settings['nav'] == 'yes') {
                $arrows = 'true';
            } else {
                $arrows = 'false';
            }

            if($settings['dots'] == 'yes') {
                $dots = 'true';
            } else {
                $dots = 'false';
            }

            if($settings['autoplay'] == 'yes') {
                $autoplay = 'true';
            } else {
                $autoplay = 'false';
            }

            $html = '
            <script>
                jQuery(document).ready(function($) {
                    $("#product-carousel-'.$rand.'").slick({
                        arrows: '.$arrows.',
                        dots: '.$dots.',
                        autoplay: '.$autoplay.',
                        prevArrow: "<i class=\'fa fa-angle-left\'></i>",
                        nextArrow: "<i class=\'fa fa-angle-right\'></i>"
                    });
                });
            </script>
            <div class="product-carousel" id="product-carousel-'.$rand.'">';
                while($q->have_posts()) : $q->the_post();
                global $product;
                    $html .= '<div class="single-c-product">
                        <div class="row">
                            <div class="col">
                            <div class="product-thumnb-c-inner">
                                <div class="product-thumnb-c" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'medium').')">';

                                if($product->is_on_sale() ) {
                                    $html .= '<span class="c-product-sale">Sale</span>';
                                }

                                $html .='
                                </div>
                            </div>
                            </div>

                            <div class="col my-auto text-center">
                                <div class="c-product-info">
                                    <h3>'.get_the_title().'</h3>
                                    <div class="c-product-price">'.$product->get_price_html().'</div>';
                                    
                                    if($average = $product->get_average_rating()) {
                                        $html .='<div class="c-product-starrating"><div class="star-rating" title="'.sprintf(__( 'Rated %s out of 5', 'woocommerce' ), $average).'"><span style="width:'.( ( $average / 5 ) * 100 ) . '%"><strong itemprop="ratingValue" class="rating">'.$average.'</strong> '.__( 'out of 5', 'woocommerce' ).'</span></div></div>';
                                    }

                                    
                                    $html .='

                                    <div class="product-add-to-cart-c">'.do_shortcode('[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]').'</div>
                                </div>
                            </div>
                        </div>
                    </div>';
                endwhile; wp_reset_query();


                $html .= '</div>';

            if($settings['from'] == 'category' && empty($settings['cat_ids'])) {
                $html = '<div class="alert alert-warning"><p>Please select product category</p></div>';  
            } 
            

            echo $html;

        }

    }


    class Avocado_ProductHoverCard_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'avocado-product-hovercard';
        }
        
        public function get_title() {
            return __( 'Avocado Product HoverCard', 'ppm-quickstart' );
        }

        public function get_icon() {
            return 'fa fa-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {

            
            
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Configuration', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'from',
                [
                    'label' => __( 'Products From', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'options' => [
                        'select'  => __( 'Select Products', 'plugin-domain' ),
                        'category'  => __( 'Select Categories', 'plugin-domain' )
                    ],
                    'default' => 'select'
                ]
            );


            $this->add_control(
                'p_ids',
                [
                    'label' => __( 'And/Or Select products', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_list(),
                    'condition' => [
                        'from' => 'select',
                    ],
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'And/Or Categories', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list(),
                    'condition' => [
                        'from' => 'category',
                    ],
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Count', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '6'
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();

            if($settings['from'] == 'category') {
                $q = new WP_Query( array(
                    'posts_per_page' => $settings['count'], 
                    'post_type' => 'product',
                    'tax_query' => array(
                        array(
                            'taxonomy' => 'product_cat',
                            'field'    => 'term_id',
                            'terms'    => $settings['cat_ids'],
                        )
                    ),
                ));
            } else {
                $q = new WP_Query( array(
                    'posts_per_page' => $settings['count'], 
                    'post_type' => 'product',
                    'post__in' => $settings['p_ids'],
                ));
            }

            

            //$q = new WP_Combine_Queries( $args );

            $html = '
            
            <div class="product-hovercard">';
                while($q->have_posts()) : $q->the_post();
                global $product;

                    $html .= '<div class="single-hc-product">
                        <div class="hc-product-base">
                            '.get_the_post_thumbnail(get_the_ID(), 'thumbnail').'
                            <span><i class="fa fa-angle-down"></i></span>
                        </div>
                        <div class="product-hovercard-info">
                            <div class="product-thumnb-hc" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'medium').')">
                            </div>
                            <h4>'.get_the_title().'</h4>
                            <div class="c-product-price">'.$product->get_price_html().'</div>
                            <div class="product-add-to-cart-c">'.do_shortcode('[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]').'
                            </div>
                        </div>
                    </div>';


                endwhile; wp_reset_query();


                $html .= '</div>';


            if($settings['from'] == 'category' && empty($settings['cat_ids'])) {
                $html = '<div class="alert alert-warning"><p>Please select product category</p></div>';  
            } 
            

            echo $html;

        }

    }


    class Avocado_AjaxProduct_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'avocado-ajax-product';
        }
        
        public function get_title() {
            return __( 'Avocado AJAX Tab', 'ppm-quickstart' );
        }

        public function get_icon() {
            return 'fa fa-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {

            
            
            $this->start_controls_section(
                'content_section',
                [
                    'label' => __( 'Configuration', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => 'Feaatured',
                ]
            );


            $this->add_control(
                'cat_ids',
                [
                    'label' => __( 'And/Or Categories', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_product_cat_list(),
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Products Count', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '9'
                ]
            );

            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();

           
            

            //$q = new WP_Combine_Queries( $args );

            $html = '
               <script>
                jQuery(document).ready(function($){
                    $(".featured-category-wrapper ul li button").on("click", function(){
                        $(".featured-category-wrapper ul li button").removeClass("active");
                        $(this).addClass("active");

                        var cat_id = $(this).attr("data-id");
                        var count = $(this).attr("data-count");   
                        var nonce = $(this).attr("data-nonce");   

                        $.ajax({
                            url: "'.admin_url('admin-ajax.php').'",
                            type: "POST",
                            data: {
                                action: "my_ajax_action",
                                cat_id: cat_id, 
                                count: count, 
                                nonce_get: nonce  
                            },
                            beforeSend: function(){
                                $(".featured-cat-products").empty();
                                $(".featured-cat-products").append(\'<div class="loading-bar"><i class="fa fa-spin fa-cog"></i> Loading</div>\');
                            },
                            success: function(html){
                                $(".featured-cat-products").empty();
                                $(".featured-cat-products").append(html);
                            }
                        });
                    });
                });
            </script> 
            <div class="featured-category-wrapper"><h3>'.$settings['title'].'</h3>';
                if (!empty($settings['cat_ids'])) {
                    $html .= '<ul>';
                        $i = 0;
                        foreach ($settings['cat_ids'] as $cat) {
                            $i++;
                            if($i == 1) {
                                $ac_class = 'active';
                            } else {
                                $ac_class = '';
                            }
                            $cat_info = get_term($cat, 'product_cat');
                            $html .= '<li><button data-count="'.$settings['count'].'" class="'.$ac_class.'" data-nonce="'.wp_create_nonce( 'my_ajax_action' ).'" data-id="'.$cat_info->term_id.'">'.$cat_info->name.'</button></li>';
                        }
                    $html .= '</ul>';

                    $html .= '<div class="featured-cat-products">';
                        $q = new WP_Query( array(
                            'posts_per_page' => $settings['count'], 
                            'post_type' => 'product',
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'product_cat',
                                    'field'    => 'term_id',
                                    'terms'    => $settings['cat_ids'][0],
                                )
                            ),
                        ));



                        $html .= '<div class="row">';

                            $thumb_id = get_term_meta( $settings['cat_ids'][0], 'thumbnail_id', true );
                            $term_img = wp_get_attachment_image_url(  $thumb_id, 'large' );

                            if (!empty($thumb_id)) {
                                $html .= '<div class="col-lg-6">
                                    <div class="f-cat-thumb" style="background-image:url('.$term_img.')">
                                    </div>
                                </div>';
                            }

                            while($q->have_posts()) : $q->the_post();
                            global $product;

                                $html .= '<div class="col-lg-2">
                                    <div class="single-f-product">
                                        <div class="single-f-product-bg" style="background-image:url('.get_the_post_thumbnail_url(get_the_ID(), 'medium').')">
                                        </div>
                                        <h4>'.get_the_title().'</h4>
                                        <div class="c-product-price">'.$product->get_price_html().'</div>
                                    </div>
                                </div>';


                            endwhile; wp_reset_query();

                        $html .= '</div>';
                    $html .= '</div>';

                }
            $html .= '</div>';


            if(empty($settings['cat_ids'])) {
                $html = '<div class="alert alert-warning"><p>Please select product category</p></div>';  
            } 
            

            echo $html;

        }

    }






    function avocado_products_list( ) {

        $args = wp_parse_args( array(
            'post_type'   => 'product',
            'numberposts' => -1,
            'orderby' => 'title',
            'order' => 'ASC',
        ) );
    
        $query_query = get_posts( $args );
    
        $dropdown_array = array();
        if ( $query_query ) {
            foreach ( $query_query as $query ) {
                $dropdown_array[ $query->ID ] = $query->post_title;
            }
        }
    
        return $dropdown_array;
    }


    function avocado_products_cat_list( ) {
        $elements = get_terms( 'product_cat', array('hide_empty' => false) );
        $product_cat_array = array();

        if ( !empty($elements) ) {
            foreach ( $elements as $element ) {
                $info = get_term($element, 'product_cat');
                $product_cat_array[ $info->term_id ] = $info->name;
            }
        }
    
        return $product_cat_array;
    }




class Avocado_stepCheckout_Widget extends \Elementor\Widget_Base {

        public function get_name() {
            return 'stepcheckout';
        }
        
        public function get_title() {
            return __( 'Step Checkout ', 'ppm-quickstart' );
        }

        public function get_icon() {
            return 'fa fa-code';
        }

        public function get_categories() {
            return [ 'general' ];
        }

        protected function _register_controls() {


            
            $this->start_controls_section(
                'step_1_config',
                [
                    'label' => __( 'Configuration Step 1', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'top_text', [
                    'label' => __( 'Top Heading', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Select Your Starter Kit' , 'plugin-domain' ),
                    'show_label' => true,
                ]
            );

            $this->add_control(
                'base_products',
                [
                    'label' => __( 'Select Base Products', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_products_list()
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'step_2_config',
                [
                    'label' => __( 'Configuration Step 2', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );

            $this->add_control(
                'step_two_title', [
                    'label' => __( 'Step Two Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Select Your Starter Kit' , 'plugin-domain' ),
                    'show_label' => true,
                ]
            );

            $this->add_control(
                'step_two_content', [
                    'label' => __( 'Step Two Content', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'Summer Eleveted Kit $199.00' , 'plugin-domain' ),
                    'show_label' => true,
                ]
            );

            $this->add_control(
                'step_two_img', [
                    'label' => __( 'Step Two Image', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'show_label' => true,
                ]
            );

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'title', [
                    'label' => __( 'Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Box Title' , 'plugin-domain' ),
                    'label_block' => true,
                ]
            );

            $repeater->add_control(
                'box_product_ids', [
                    'label' => __( 'Select Box Products', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_products_list()
                ]
            );

            $this->add_control(
                'boxes',
                [
                    'label' => __( 'Product Boxes', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'box_title' => __( 'Box Title', 'plugin-domain' ),
                        ],
                    ]
                ]
            );

            $this->end_controls_section();


            $this->start_controls_section(
                'step_3_config',
                [
                    'label' => __( 'Configuration Step 3', 'plugin-name' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                ]
            );


            $this->add_control(
                'step_three_title', [
                    'label' => __( 'Step Three Title', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'Choose Add-Ons' , 'plugin-domain' ),
                    'show_label' => true,
                ]
            );

            $this->add_control(
                'step_three_products',
                [
                    'label' => __( 'Select Step Three Products', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT2,
                    'multiple' => true,
                    'options' => avocado_products_list()
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Products Count', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => '8'
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Columns', 'plugin-domain' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '4',
                    'options' => [
                        '4'  => __( '4 Columns', 'plugin-domain' ),
                        '3'  => __( '3 Columns', 'plugin-domain' ),
                        '2'  => __( '2 Columns', 'plugin-domain' ),
                        '1'  => __( '1 Columns', 'plugin-domain' ),
                    ],
                ]
            );


            $this->end_controls_section();

        }

        protected function render() {

            $settings = $this->get_settings_for_display();

            if($settings['columns'] == '4') {
                $columns_markup = 'col-lg-3';
            } else if($settings['columns'] == '3') {
                $columns_markup = 'col-lg-4';
            } else if($settings['columns'] == '2') {
                $columns_markup = 'col-lg-6';
            } else {
                $columns_markup = 'col';
            }

            $step_1_q = new WP_Query( array(
                'posts_per_page' => 2, 
                'post_type' => 'product',
                'post__in' => $settings['base_products'],
            ));

            $step_3_q = new WP_Query( array(
                'posts_per_page' => $settings['count'], 
                'post_type' => 'product',
                'post__in' => $settings['step_three_products'],
            ));

            
            $html = '

            <script>
                jQuery(document).ready(function($){

                    $("#steped-checkout-1 .step-1-product-btn").on( "click", function(){
                        $(\'.nav-tabs a[href="#steped-checkout-2"]\').tab("show");
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        $(\'.nav-tabs a[href="#steped-checkout-2"],.nav-tabs a[href="#steped-checkout-3"]\').attr("data-toggle", "tab");
                    });
                    $(".next-step-link").on("click",function(){
                        
                        $(\'.nav-tabs a[href="#steped-checkout-3"]\').tab("show");
                        $("html, body").animate({ scrollTop: 0 }, "slow");
                        return false;
                    });
                });
            </script>


            <div class="steped-checkout">
                <div class="step-indicator text-center">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#steped-checkout-1" role="tab" aria-controls="steped-checkout-1" aria-selected="true">Step 1</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link"  href="#steped-checkout-2" role="tab" aria-controls="steped-checkout-2" aria-selected="false">Step 2</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="#steped-checkout-3" role="tab" aria-controls="steped-checkout-3" aria-selected="false">Step 3</a>
                        </li>
                    </ul>
                </div>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="steped-checkout-1" role="tabpanel">
                        <div class="step-header-text">'.do_shortcode(wpautop($settings['top_text'])).'</div>
                        <div class="row">';

                            while($step_1_q->have_posts()) : $step_1_q->the_post();
                            global $product;

                            $html .='<div class="col">
                                <div class="step-1-product">
                                    <div class="step-1-product-img">
                                        '.get_the_post_thumbnail(get_the_ID(), 'large').'
                                    </div>
                                    <div class="step-1-product-title">
                                        <h3>'.get_the_title().'</h3>
                                    </div>
                                    <div class="step-1-product-content">
                                        '.wpautop(get_the_content()).'
                                    </div>
                                    <div class="step-1-product-price">
                                        '.$product->get_price_html().'
                                    </div>
                                    <div class="step-1-product-btn">
                                        '.do_shortcode('[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]').'
                                    </div>
                                </div>
                            </div>';
                            endwhile; wp_reset_query();

                        $html .='
                        </div> 
                    </div>
                    <div class="tab-pane fade" id="steped-checkout-2" role="tabpanel">
                        <h2 class="step-title text-center">'.$settings['step_two_title'].'</h2>
                        <div class="row">
                            <div class="col">
                                <img src="'.wp_get_attachment_image_url($settings['step_two_img']['id'], 'large').'" alt="">
                            </div>
                            <div class="col">
                                '.wpautop($settings['step_two_content']).'';

                                    if (!empty($settings['boxes'])) {
                                        foreach ($settings['boxes'] as $box) {
                                            $html .='<div class="step-two-box">
                                                <h3>'.$box['title'].'</h3>';

                                                //$html .= '
                                                if (!empty($box['box_product_ids'])) {
                                                    $html .='<div class="row">';
                                                        foreach($box['box_product_ids'] as $box_p){
                                                            $html .='<div class="col">
                                                                <div class="box-single-product">
                                                                    <div class="box-product-bg" style="background-image:url('.get_the_post_thumbnail_url($box_p, 'medium').')">
                                                                    </div>
                                                                    '.do_shortcode('[add_to_cart style="" show_price="FALSE" id="'.$box_p.'"]').'
                                                                </div>     
                                                            </div>';
                                                        }
                                                    $html .='</div>';
                                                }
                                                $html .= '
                                        </div>';
                                        }
                                    }

                                $html .= '

                                <div class="next-step-link text-right"><a href="" class="bordered-btn">Next Step <i class="fa fa-angle-double-right"></i></a></div>

                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="steped-checkout-3" role="tabpanel">
                        <h2 class="step-title text-center">'.$settings['step_three_title'].'</h2>
                        <div class="row">';

                           if(!empty($settings['step_three_products'])) {


                            while($step_3_q->have_posts()) : $step_3_q->the_post();
                            global $product;

                            $html .='<div class="'.$columns_markup.'">
                                <div class="step-1-product">
                                    <div class="step-1-product-img">
                                        '.get_the_post_thumbnail(get_the_ID(), 'large').'
                                    </div>
                                    <div class="step-1-product-title">
                                        <h3>'.get_the_title().'</h3>
                                    </div>
                                    <div class="step-1-product-content">
                                        '.wpautop(get_the_excerpt()).'
                                    </div>
                                    <div class="step-1-product-price">
                                        '.$product->get_price_html().'
                                    </div>
                                    <div class="step-1-product-btn">
                                        '.do_shortcode('[add_to_cart style="" show_price="FALSE" id="'.get_the_ID().'"]').'
                                    </div>
                                </div>
                            </div>';
                            endwhile; wp_reset_query();

                            } else {
                                $html = '<div class="alert alert-warning"><p>Please select categories.</p></div>';
                            }

                        $html .= ' </div>

                </div>';
            $html .= '</div>';
            

            echo $html;

        }

    }





}
