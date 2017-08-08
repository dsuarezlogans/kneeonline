<?php
/**
 * The template for displaying all single posts.
 *
 * @package footankle
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<?php
		if ((get_post_type() == 'profesor') || (get_post_type() == 'partner'))
			{
				if (ICL_LANGUAGE_CODE == 'es')
					echo '<a href="/quienes-somos/">< Volver</a>';
				else
					echo '<a href="/quienes-somos/">< Volver</a>';

			}
			echo '<BR>';


		?>
		<main id="main" class="site-main" role="main">

		<?php while ( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'content', 'single' ); ?>

			<?php the_post_navigation(); ?>

			<?php
				// If comments are open or we have at least one comment, load up the comment template
				if ( comments_open() || get_comments_number() ) :
					comments_template();
				endif;
			?>

		<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
