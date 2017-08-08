<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package footankle
 */

get_header(); ?>


	<div id="slider1" class="slider-area">

		<!-- DIFFERENT SLIDES FOR DIFFERENT LANGUAGES -->

		<?php putRevSlider("knee-test", "homepage"); ?>

	</div>
<?php include "inc/user-menu.php" ?>

<div id="primary" class="posts-area">
	<main id="main" class="posts-inside" role="main">

	<?php

		query_posts( array(
				'orderby' => 'date',
				'posts_per_page' => 3
				) );


		if ( have_posts() ) : ?>

		<div class="home-posts">

		<!--<div class="home-posts-title"><?php _e('Noticias recientes','footankle'); ?>:</div><BR>-->
		<?php /* Start the Loop */ ?>
		<?php while ( have_posts() ) : the_post(); ?>

			<div class="home-post-item">
			<?php
				/* Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'content', get_post_format() );
			?>
			</div>
		<?php endwhile; ?>

		</div>
	<?php else : ?>

		<?php get_template_part( 'content', 'none' ); ?>

	<?php endif; ?>

	</main><!-- #main -->


</div><!-- #primary -->

	<div class="site-testimonies">
		<div class="site-inside">
			<div class="testimony">
				<?php _e('Opinan nuestros doctores:','footankle'); ?>


				<?php //GET TESTIMONIES
					query_posts( array(
					'post_type' => 'testimony',
					'meta_key' => 'wpcf-origen_testimonio',
					'meta_value' => 2,
					'orderby' => 'rand',
					'posts_per_page' => 1
					) );

										// the Loop
					while (have_posts()) : the_post();
						$name = get_the_title();
						$company = types_render_field("company_testimonio", array("output"=>"raw"));
						echo '<div class="text-bubble">';
						echo '"' . get_the_content( ) . '"';
						echo '</div>'; ?>
						<img class="testimony_icon" src="<?php bloginfo('template_directory'); ?>/img/person_icon.png">
						<span class="testimony_name"><B><?php echo $name; ?></B>, <?php echo $company; ?></span>
						<br clear="left">
				<?php
					endwhile;
				?>

			</div>
			<div class="testimony">
				<?php _e('Opinan nuestros alumnos:','footankle'); ?>
				<?php //GET TESTIMONIES
					query_posts( array(
					'post_type' => 'testimony',
					'meta_key' => 'wpcf-origen_testimonio',
					'meta_value' => 1,
					'orderby' => 'rand',
					'posts_per_page' => 1
					) );

										// the Loop
					while (have_posts()) : the_post();
						$name = get_the_title();
						$company = types_render_field("company_testimonio", array("output"=>"raw"));

						echo '<div class="text-bubble">';
						echo '"' . get_the_content( ) . '"';
						echo '</div>'?>
						<img class="testimony_icon" src="<?php bloginfo('template_directory'); ?>/img/person_icon.png">
						<span class="testimony_name"><B><?php echo $name; ?></B>, <?php echo $company; ?></span>
						<br clear="left">

				<?php
					endwhile;
				// important
				wp_reset_query();
				?>
			</div>
		</div>
	</div>

	<!-- SOCIEDADES -->
	<div class="sponsors">
	<BR>
		<?php //GET LOGOS FROM SPONSORS
			query_posts( array(
				'post_type' => 'sociedades',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			) );

			// the Loop
			while (have_posts()) : the_post();
				$pagina = types_render_field("sponsor-web", array("output"=>"raw"));
				$imagen = types_render_field("sponsor-logo", array("output"=>"raw"));
				echo '<a target="_blank" title="'. get_the_title(). '" href="' . $pagina . '"><img class="sponsor-logo" src="' . $imagen . '"></a>';
			endwhile;
			?>

	</div>


	<div class="site-content">
		<div class="site-inside">
			<?php if (ICL_LANGUAGE_CODE == 'es') {
					$video_code = 201948845;
					$video_code_entra = 201948845;
					$video_code_historia = 201948845;
				} else {
					$video_code = 201948845;
				}
				?>
			<div class="video-container">
				<div class='embed-container'><iframe name="video-player" src='https://player.vimeo.com/video/<?php echo $video_code ?>?color=f1ad24&title=0&byline=0&portrait=0' frameborder='0' webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe></div>
			<?php query_posts( array(
					'post_type' => 'videosext',
					'posts_per_page' => 6
					) );

			if ( have_posts() ) {
				echo '<ul id="horiz_container_outer"><li id="horiz_container_inner"><ul id="horiz_container">';
			 while ( have_posts() ) {
			 		the_post();

				 	 //the_title();
				 	echo '<li><a target="video-player" title="'. get_the_title() . '" href="https://player.vimeo.com/video/' . types_render_field("video_id", array("output"=>"raw")) . '?color=ff5b35&title=0&byline=0&portrait=0">';
					the_post_thumbnail( 'custom-block' , array('class' => 'video-thumb'));
					echo '</a></li>';
				}
				echo '<li><a href="http://vimeo.com/footankleco" target="_blank" title="' . __('More videos','footankle') . '"><img src="' . get_bloginfo('template_directory') . '/img/more-videos.png"></a></li>';
				echo '</ul></li></ul>';
			}
			?>
			<div id="scrollbar">
			    <a id="left_scroll" class="mouseover_left" href="#"></a>
			    <div id="track">
			         <div id="dragBar"></div>
			    </div>
			    <a id="right_scroll" class="mouseover_right" href="#"></a>
			</div>


			</div>
			<!--img class="video-item" align="right" src="<?php bloginfo('template_directory'); ?>/img/video-dummy.jpg"-->
			<div class="video-home-title">
				<?php _e("Knee Course Online"); ?>
			</div>
			<div class="video-home-text">
				<?php _e("Descubre en este v&iacute;deo nuestra filosof&iacute;a formativa, una nueva manera de ver el mundo de la patolog&iacute;a de la rodilla en una formaci&oacute;n actual y 100% online.",'footankle'); ?>


			</div>

		</div>
	</div>

	<div class="sponsors">

		<?php //GET LOGOS FROM SPONSORS
			query_posts( array(
				'post_type' => 'sponsor',
				'orderby' => 'menu_order',
				'order' => 'ASC'
			) );

			// the Loop
			while (have_posts()) : the_post();
				$pagina = types_render_field("sponsor-web", array("output"=>"raw"));
				$imagen = types_render_field("sponsor-logo", array("output"=>"raw"));
				echo '<a target="_blank" title="'. get_the_title(). '" href="' . $pagina . '"><img class="sponsor-logo" src="' . $imagen . '"></a>';
			endwhile;
			?>

	</div>

	<div class="site-inside">

		<?php //GET TESTIMONIES
			query_posts( array(
				'post_type' => 'page',
				'orderby' => 'menu_order',
				'order' => 'ASC',
				'meta_key' => 'wpcf-home_intro',
				'meta_value' => 1,
				'posts_per_page' => 3
			) );

			// the Loop
			while (have_posts()) : the_post();
				$imagen = types_render_field("home_icon", array("output"=>"raw"));
				echo '<div class="main-intro">';
				echo '<img class="home-icon" src="' . $imagen . '"><BR clear="all">';
				echo '<div class="home-intro-title">' . get_the_title() . '</div>';
				echo get_the_content('<div class="more-link">'.__('Leer mas','footankle').' ></div>');
				echo '</div>';
			endwhile;

			?>
	</div>

	<div class="home-feature">
		<div class="feature-item">
			<div class="feature-icon"><img src="<?php bloginfo('template_directory'); ?>/img/wifi.png"></div>
			<div class="feature-text">
				<div style="font-size:16pt;padding-top:8px;font-weight:bold; text-align:left;"><?php _e('Knee Course Online', 'footankle'); ?></div>
				<div style="line-height: 11pt; font-size: 12pt;"><?php _e('Haz una prueba de nivelaci&oacute;n gratis. Prueba como puedes formar parte de esta experiencia.','footankle'); ?></div>

			</div>
			<div class="feature-button">
				<?php $mc_id = get_id_by_slug('avance-gratuito');
					if (ICL_LANGUAGE_CODE == 'es')
						$mc_trans_link = 'producto/cirugia-de-pie-y-tobillo';
					else
						$mc_trans_link = 'courses/free-preview';

					?>
				<a href="<?php echo '#'//$mc_trans_link ?>"><button style="color:#0f1428;"><?php _e('Proximamente'); ?></button></a>
			</div>

		</div>
	</div>
<!-- NONE IN HOME PAGE!!!! ?php get_sidebar(); ? -->
<script type="text/javascript">
  /*  $(document).ready(function(){
        $('#horiz_container_outer').horizontalScroll();
    });*/
</script>

<?php get_footer(); ?>
