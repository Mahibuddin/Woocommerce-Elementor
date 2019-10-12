<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package RRFCommerce
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header><!-- .entry-header -->

	<?php rrfcommerce_post_thumbnail(); ?>

	<?php if(is_account_page() && is_user_logged_in()) :?>
		<div class="dashboard-top-nav">
			<div class="container">
				<div class="row">
					<div class="col-lg-3">My Orders</div>
					<div class="col-lg-3">My Orders</div>
					<div class="col-lg-3">My Orders</div>
					<div class="col-lg-3">My Orders</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<div class="entry-content <?php if(is_account_page() && !is_user_logged_in()) :?>login-bg<?php endif; ?>">
		<?php
		the_content();

		wp_link_pages( array(
			'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'rrfcommerce' ),
			'after'  => '</div>',
		) );
		?>
	</div><!-- .entry-content -->

	<?php if(is_account_page() && !is_user_logged_in()) :?>
		<div class="login-cta">
			<div class="container">
				<div class="row">
					<div class="col my-auto">
						<h2>Professionally Designed Decor Delivered Right to Your Door</h2>
					</div>
					<div class="col col-auto my-auto">
						<a href="" class="boxed-btn">Let's Get Started</a>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<?php if ( get_edit_post_link() ) : ?>
		<footer class="entry-footer">
			<?php
			edit_post_link(
				sprintf(
					wp_kses(
						/* translators: %s: Name of current post. Only visible to screen readers */
						__( 'Edit <span class="screen-reader-text">%s</span>', 'rrfcommerce' ),
						array(
							'span' => array(
								'class' => array(),
							),
						)
					),
					get_the_title()
				),
				'<span class="edit-link">',
				'</span>'
			);
			?>
		</footer><!-- .entry-footer -->
	<?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
