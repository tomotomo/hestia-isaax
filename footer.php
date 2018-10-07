<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "wrapper" div and all content after.
 *
 * @package Hestia
 * @since Hestia 1.0
 */
?>

		<footer class="footer footer-black footer-big">
			<?php hestia_before_footer_content_trigger(); ?>
			<div class="container">
				<?php hestia_before_footer_widgets_trigger(); ?>

		<div class="content">
			<div class="row">
				<?php
				$sidebars = (function () {
					$footer_sidebars_array = array(
						'footer-one-widgets',
						'footer-two-widgets',
						'footer-three-widgets',
						'footer-four-widgets',
					);
					$number_of_sidebars    = get_theme_mod( 'hestia_nr_footer_widgets', '3' );
					$footer_sidebars_array = array_slice( $footer_sidebars_array, 0, $number_of_sidebars );

					return $footer_sidebars_array;
				})();
				foreach ( $sidebars as $footer_sidebar ) {
					if ( is_active_sidebar( $footer_sidebar ) ) {
						echo '<div class="col-md-4">';
						dynamic_sidebar( $footer_sidebar );
						echo '</div>';
					}
				}
				?>
			</div>
		</div>
		<hr/>
				<?php hestia_after_footer_widgets_trigger(); ?>
				<div class="hestia-bottom-footer-content">
					Copyright <a href="https://xshell.io/" title="IoTの受託開発ならXSHELL">XSHELL Inc.</a>
				</div>
			</div>
			<?php hestia_after_footer_content_trigger(); ?>
		</footer>
		</div>
	</div>
<?php wp_footer(); ?>
</body>
</html>
