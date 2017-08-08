<?php
/**
 * @package footankle
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<a href="<?php echo esc_url( get_permalink() ); ?>">
		<div class="top-post">

			<div class="top-post-left">
				<?php echo get_the_date(); ?>
			</div>

			<!--<div class="top-post-right">
				<?php comments_number('0','1','%'); ?>
			</div>-->
			<?php the_post_thumbnail( 'custom-block' ); ?></a>
		</div>
		<?php the_title( sprintf( '<h1 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h1>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			/* translators: %s: Name of current post */
			the_excerpt();
		?>

		<div class="posts-more-link"><a href="<?php the_permalink(); ?>"><?php _e('Leer mas >','footankle'); ?></a></div>


		<!--?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'footankle' ),
				'after'  => '</div>',
			) );
		?-->
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php _e("Posted on: ",'footankle'); ?>
		<?php $category = get_the_category();
				echo '<a href="' . get_category_link($category[0]->cat_ID) . '">';
				echo $category[0]->cat_name;
				echo '</a>'; ?>
		<!--?php footankle_entry_footer(); ?-->
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
