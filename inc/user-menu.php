		<?php if ( is_user_logged_in() ) { ?>
		<div class="secondary-nav">
			<div class="site-inside">
				<?php $wc_ma = get_option('woocommerce_myaccount_page_id');
					if ($wc_ma) {
						//$wc_ma_id = icl_object_id($wc_ma, 'page', true,ICL_LANGUAGE_CODE);
						$wc_ma_link = get_permalink(116);
					}
				?>
				<a href="<?php echo $wc_ma_link; ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/04_settings_100px.png"></P>
						<?php _e('Mi Cuenta','footankle'); ?>
					</div>
				</a>
				<?php $mc_id = get_id_by_slug('mis-cursos');
					if ($mc_id) {
							//$mc_trans_id = icl_object_id($mc_id, 'page', true,ICL_LANGUAGE_CODE);
							$mc_trans_link = get_permalink(395);
						?>

				<a href="<?php echo $mc_trans_link; ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/06_learn_100px.png"></P>
						<?php _e('Mis Cursos','footankle'); ?>
					</div>
				</a>
				<?php } ?>
				<?php $ml_id = get_id_by_slug('mis-logros');
					if ($ml_id) {
							//$ml_trans_id = icl_object_id($ml_id, 'page', true,ICL_LANGUAGE_CODE);
							$ml_trans_link = get_permalink(388);
						?>

				<a href="<?php echo $ml_trans_link; ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/05_achieve_100px.png"></P>
						<?php _e('Logros','footankle'); ?>
					</div>
				</a>
				<?php } ?>
				<?php
					if ('es' == 'es')
					    $cart_url = "/cart/";
					else
						$cart_url = "/en/cart";
				 ?>
				<a href="<?php echo $cart_url; ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/12_shopping_car_O_100px.png"></P>
						<?php _e('Mi Carrito','footankle'); ?>
					</div>
				</a>
				<?php
					$user = wp_get_current_user();
  					if( is_array( $user->roles ) && in_array( 'group_leader', $user->roles ) ) { ?>
  				<a href="<?php echo get_admin_url(); ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/13_2_lesson_empty_W_100px.png"></P>
						<?php _e('Mis grupos','footankle'); ?>
					</div>
				</a>
				<?php } ?>
  				<a href="<?php echo wp_logout_url('/'); ?>" class="nav-link">
					<div class="nav-button">
						<P><img src="<?php bloginfo('template_directory'); ?>/img/logout_01_O_100px.png"></P>
						<?php _e('Salir','footankle'); ?>
					</div>
				</a>



			</div>
		</div>
		<?php } ?>
