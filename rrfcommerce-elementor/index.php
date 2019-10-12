<?php
/**
 * Plugin Name: RRF Commerce Elementor 
 * Description: Custom Elementor extension for RRF Commerce Theme.
 * Plugin URI:  https://anythings.com/
 * Version:     1.0.0
 * Author:      Mahib Uddin
 * Author URI:  https://anythingsauthor.com/
 * Text Domain: rrfcommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


final class RRF_Commerce_Extension {


	const VERSION = '1.0.0';

	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	const MINIMUM_PHP_VERSION = '5.4';


	private static $_instance = null;


	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}


	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}


	public function i18n() {

		load_plugin_textdomain( 'rrfcommerce
' );

	}


	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'widget_styles' ] );
		// add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );
	}


	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'rrfcommerce
' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'rrfcommerce
' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rrfcommerce
' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rrfcommerce
' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'rrfcommerce
' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'rrfcommerce
' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'rrfcommerce
' ),
			'<strong>' . esc_html__( 'Elementor Test Extension', 'rrfcommerce
' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'rrfcommerce
' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}


	public function init_widgets() {

		// Include Widget files
		require_once( __DIR__ . '/widgets/slider.php' );
		require_once( __DIR__ . '/widgets/content-block.php' );
		require_once( __DIR__ . '/widgets/product.php' );

		// Register widget
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \RRFCommerce_slider_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \RRFCommerce_contentBlock_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \RRFCommerce_product_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_Categories_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_ProductCarousel_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_ProductHoverCard_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_AjaxProduct_Widget() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Avocado_stepCheckout_Widget() );

	}


	public function widget_styles() {

		wp_enqueue_style( 'rrfcommerce-slider', plugins_url( 'widgets/css/slider.css', __FILE__ ) );
		wp_enqueue_style( 'rrfcommerce-content-block', plugins_url( 'widgets/css/contentBlock.css', __FILE__ ) );

	}


/**
	public function init_controls() {

		// Include Control files
		require_once( __DIR__ . '/controls/test-control.php' );

		// Register control
		\Elementor\Plugin::$instance->controls_manager->register_control( 'control-type-', new \Test_Control() );

	}
*/

}

RRF_Commerce_Extension::instance();



/**
 * Enqueue scripts and styles.
 */
function rrfcommerce_plugin_scripts() {
	
	wp_enqueue_style( 'slick', plugins_url( 'assets/css/slick.css', __FILE__ ) );

	wp_enqueue_script( 'slick', plugins_url( 'assets/js/slick.min.js', __FILE__ ), array('jquery'), '1.8.1', true );

}
add_action( 'wp_enqueue_scripts', 'rrfcommerce_plugin_scripts' );




/**
 * Using AJAX
 */

add_action( 'wp_ajax_my_ajax_action', 'my_ajax_function' );
add_action( 'wp_ajax_nopriv_my_ajax_action', 'my_ajax_function' );


function my_ajax_function(){
	

    // for nonce varify...
    if (wp_verify_nonce($_POST['nonce_get'], 'my_ajax_action')) {
    	
    	$q = new WP_Query( array(
            'posts_per_page' => $_POST['count'], 
            'post_type' => 'product',
            'tax_query' => array(
                array(
                    'taxonomy' => 'product_cat',
                    'field'    => 'term_id',
                    'terms'    => $_POST['cat_id'],
                )
            ),
        ));

    	
	    $html ='<div class="row">';
	    	$thumb_id = get_term_meta( $_POST['cat_id'], 'thumbnail_id', true );
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

	    $html .='</div>';

    }else{
    	$html = '<div class="alert alert-danger">Error!</div>';
    }

	

	echo $html;


	die();
}




