<?php
/**
 * Plugin Name: WooCommerce
 * Plugin URI: https://woocommerce.com/
 * Description: An eCommerce toolkit that helps you sell anything. Beautifully.
 * Version: 3.4.2
 * Author: Automattic
 * Author URI: https://woocommerce.com
 * Text Domain: woocommerce
 * Domain Path: /i18n/languages/
 *
 * @package WooCommerce
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Define WC_PLUGIN_FILE.
if ( ! defined( 'WC_PLUGIN_FILE' ) ) {
	define( 'WC_PLUGIN_FILE', __FILE__ );
}

// Include the main WooCommerce class.
if ( ! class_exists( 'WooCommerce' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-woocommerce.php';
}

/**
 * Main instance of WooCommerce.
 *
 * Returns the main instance of WC to prevent the need to use globals.
 *
 * @since  2.1
 * @return WooCommerce
 */
//function wc() {
	//return WooCommerce::instance();
//}

// Global for backwards compatibility.
//$GLOBALS['woocommerce'] = wc();

add_filter('woocommerce_before_add_to_cart_form', 'rrfcommerce_single_product_tab'); 
function rrfcommerce_single_product_tab(){

	if (get_post_meta(get_the_ID(), 'tab_product_meta', true)) {
		$meta = get_post_meta(get_the_ID(), 'tab_product_meta', true);
	}else{
		$meta = array();
	}

	if (array_key_exists('top_tab', $meta)) {
		$top_tab = $meta['top_tab'];
	}else{
		$top_tab = '';
	}

	if (!empty($top_tab)) {

		$tab_title_id = 0;
		$tab_content_id = 0;
		$html = '
		<ul class="nav" role="tablist">';

			foreach($top_tab as $tab){

				$tab_title_id ++;
				if ($tab_title_id == 1) {
					$active_class = 'active';
				}else{
					$active_class = '';
				}
				$html .= '<li class="nav-item"><a class="nav-link '.$active_class.'" href="#tab-'.$tab_title_id.'" role="tab" data-toggle="tab">'.$tab['title'].'</a></li>';
			}
		    $html .='
		    
		</ul>
		 
		<div class="tab-content">';

			foreach($top_tab as $tab){

				$tab_content_id ++;
				if ($tab_content_id == 1) {
					$con_active_class = 'in active show';
				}else{
					$con_active_class = '';
				}
				$html .= '<div role="tabpanel" class="tab-pane fade '.$con_active_class.'" id="tab-'.$tab_content_id.'"> '.wpautop($tab['content']).'</div>';
			}

			$html .='
			
		</div';
	}else{
		$html = '';
	}

	

	echo $html;
}





add_filter('woocommerce_product_meta_end', 'rrfcommerce_single_product_video');
function rrfcommerce_single_product_video(){

	if (get_post_meta(get_the_ID(), 'tab_product_meta', true)) {
		$vmeta = get_post_meta(get_the_ID(), 'tab_product_meta', true);
	}else{
		$vmeta = array();
	}


	if (array_key_exists('videos', $vmeta)) {
		$videos = $vmeta['videos'];
	}else{
		$videos = '';
	}


	//$video_id = 0;
	if (!empty($videos)) {

		$html = '
		<div class="video-area">';
			//$video_id++;
			foreach($videos as $video){
				$html .='
					<video id="my-video" class="video-js"  controls preload="auto">
						<source src="'.$video['v_id'].'" type="video/mp4">
						<p>Your browser doesn support HTML5 video. Here is
							a <a href="myVideo.mp4">link to the video</a> instead.</p>
					</video>';
			}
		$html .=' 
		</div>';

		
	}else{
		$html = '';
	}
	echo $html;
}






add_filter('woocommerce_before_add_to_cart_form', 'add_custom_price_before_cart');
function add_custom_price_before_cart(){

	$product = wc_get_product( get_the_ID() );
	if ($product->is_on_sale()) {
		// koto percent save holo, ekhane vag kore dekhate hobe...
		echo '<div class="my-custom-price">'.$product->get_price_html().' - You Save : </div>';
	}else{
		echo '<div class="my-custom-price">'.$product->get_price_html().'</div>';
	}
	
}





/**
 * Add a custom product data tab
 */
add_filter( 'woocommerce_product_tabs', 'woo_new_product_tab' );
function woo_new_product_tab( $tabs ) {

	if (get_post_meta(get_the_ID(), 'tab_product_meta', true)) {
		$meta = get_post_meta(get_the_ID(), 'tab_product_meta', true);
	}else{
		$meta = array();
	}

	if (array_key_exists('specifications', $meta)) {
		$specifications = $meta['specifications'];
	}else{
		$specifications = '';
	}

	if ($specifications) {
		// Adds the new tab
		$tabs['specifications'] = array(
			'title' 	=> __( 'Specifications', 'woocommerce' ),
			'priority' 	=> 50,
			'callback' 	=> 'woo_new_product_tab_content'
		);

	}

	
	return $tabs;

}
function woo_new_product_tab_content() {

	// The new tab content
	if (get_post_meta(get_the_ID(), 'tab_product_meta', true)) {
		$meta = get_post_meta(get_the_ID(), 'tab_product_meta', true);
	}else{
		$meta = array();
	}

	if (array_key_exists('specifications', $meta)) {
		$specifications = $meta['specifications'];
	}else{
		$specifications = '';
	}

	if (!empty($specifications)) {
		// Adds the new tab
		echo ''.wpautop($specifications).'';

	}
	
}




