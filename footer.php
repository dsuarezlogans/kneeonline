<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package footankle
 */
?>

<script type="text/javascript">
$(document).ready(function(){
	 var shrinkHeader = 1;
		$(window).scroll(function() {
			var scroll = getCurrentScroll();
				if ( scroll >= shrinkHeader ) {
						 $('.fixed-header').addClass('shrink');
						 $('#logo-img').addClass('logo-img');
					}
					else {
							$('.fixed-header').removeClass('shrink');
							$('#logo-img').removeClass('logo-img');
					}
		});
	function getCurrentScroll() {
			return window.pageYOffset || document.documentElement.scrollTop;
			}
	});
</script>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<div class="site-info">

		<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<?php dynamic_sidebar( 'footer-1' ); ?>
		<?php endif; ?>


			<!--div class="footer-block">
				<img src="<?php bloginfo('template_directory'); ?>/img/logo_footer.png" alt="Foot & Ankle"><BR>





				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'footankle' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'footankle' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'footankle' ), 'footankle', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div>
			<div class="footer-block">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'footankle' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'footankle' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'footankle' ), 'footankle', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div>
			<div class="footer-block">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'footankle' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'footankle' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'footankle' ), 'footankle', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div>
			<div class="footer-block">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'footankle' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'footankle' ), 'WordPress' ); ?></a>
				<span class="sep"> | </span>
				<?php printf( __( 'Theme: %1$s by %2$s.', 'footankle' ), 'footankle', '<a href="http://underscores.me/" rel="designer">Underscores.me</a>' ); ?>
			</div -->
		</div><!-- .site-info -->
		<div class="social-footer">
			<div class="social-info">
				<div class="social-sites">
					<a target="_blank" class="social-icon-t" href="http://twitter.com/footankleco"><i class="fa fa-twitter" aria-hidden="true"></i></a>
					<a target="_blank" class="social-icon-f" href="https://www.facebook.com/footankleco?fref=ts"><i class="fa fa-facebook" aria-hidden="true"></i></a>
					<!-- a href="http://linkedin.com/"><img src="<?php bloginfo('template_directory'); ?>/img/30_solo_in_100px.png" width="30" height="30"></a -->
				</div>
					Copyright 2017 Knee Course Online | Todos los Derechos Reservados |
			</div>
		</div>
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
