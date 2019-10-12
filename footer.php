<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package RRFCommerce
 */

?>


					</div><!-- #content -->

					<footer id="colophon" class="site-footer">
						<div class="row">
							<div class="col">
								<h2><?php echo bloginfo( 'name' ); ?></h2>
								<div class="footer-left-menu">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'footer-left-menu'
										) );
									?>
								</div>
							</div>
							<div class="col-md-2">
								<a class="ScrollUp" id="agencyScrollUp" href="#">
									<i class="fa fa-chevron-up"></i>
								</a>
							</div>
							<div class="col text-right">
								<div class="footer-right-menu">
									<?php
										wp_nav_menu( array(
											'theme_location' => 'footer-right-menu'
										) );
									?>
								</div>
							</div>
						</div>
						
					</footer><!-- #colophon -->

				</div>
			</div>
		</div>
	</div>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
