<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://docs.woocommerce.com/document/template-structure/
 * @package WooCommerce/Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked wc_print_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>
<div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	<div class="row">
		<div class="col-lg-6">
			<?php
				$attachment_ids = $product->get_gallery_image_ids ();
				if(!empty($attachment_ids)) : 
			?>

				<script>
					jQuery(document).ready(function($){
						 $('.product-big-img').slick({
						  slidesToShow: 1,
						  slidesToScroll: 1,
						  arrows: false,
						  fade: true,
						  asNavFor: '.product-small-img'
						});
						$('.product-small-img').slick({
						  slidesToShow: 3,
						  slidesToScroll: 1,
						  asNavFor: '.product-big-img',
						  dots: false,
						  arrows: true,
						  centerMode: true,
						  focusOnSelect: true
						});
					});
				</script>

				<div class="product-big-img">
					<?php foreach ($attachment_ids as $limg) : ?>
						<div class="single-gallery-img">
							<img src="<?php echo wp_get_attachment_image_url($limg, 'large'); ?>" alt="">
						</div>
					<?php endforeach;?>
				</div>
				<div class="product-small-img">
					<?php foreach ($attachment_ids as $simg) : ?>
						<div class="single-gallery-img">
							<img src="<?php echo wp_get_attachment_image_url($simg, 'large'); ?>" alt="">
						</div>
					<?php endforeach;?>
				</div>

			<?php else : the_post_thumbnail('large'); endif; ?>

			<!-- Share Buttons -->
			<div class="social-share">
				<div class="addthis_inline_share_toolbox_4pxk"></div>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="summary entry-summary">
				<?php
				/**
				 * Hook: woocommerce_single_product_summary.
				 *
				 * @hooked woocommerce_template_single_title - 5
				 * @hooked woocommerce_template_single_rating - 10
				 * @hooked woocommerce_template_single_price - 10
				 * @hooked woocommerce_template_single_excerpt - 20
				 * @hooked woocommerce_template_single_add_to_cart - 30
				 * @hooked woocommerce_template_single_meta - 40
				 * @hooked woocommerce_template_single_sharing - 50
				 * @hooked WC_Structured_Data::generate_product_data() - 60
				 */
				do_action( 'woocommerce_single_product_summary' );
				?>
			</div>
		</div>
	</div>






	<?php
	/**
	 * Hook: woocommerce_after_single_product_summary.
	 *
	 * @hooked woocommerce_output_product_data_tabs - 10
	 * @hooked woocommerce_upsell_display - 15
	 * @hooked woocommerce_output_related_products - 20
	 */
	do_action( 'woocommerce_after_single_product_summary' );
	?>
</div>

<?php do_action( 'woocommerce_after_single_product' ); ?>





			<!-- Share Buttons -->

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5d3ee4b2b3ecce94"></script>



