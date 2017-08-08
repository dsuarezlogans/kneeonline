<?php
/*
Template Name: Blog Main Page
*/
get_header(); ?>


	<div id="primary" class="posts-area white">
		<main id="main" class="posts-inside" role="main"><BR>
<header class="entry-header"><h1 class="entry-title"><?php the_title(); ?></h1>	</header>
	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'post_type' => 'post', 'posts_per_page' => 9, 'paged' => $paged );
		$wp_query = new WP_Query($args);
		echo '<div class="home-posts">';
		while ( have_posts() ) : the_post(); ?>
			<div class="home-post-item">
		    <?php get_template_part( 'content', get_post_format() ); ?>
			</div>
	<?php endwhile; 
		echo '</div>';
	?>

<!-- then the pagination links -->
<?php next_posts_link( '&larr; '.__('Posts anteriores'), $wp_query ->max_num_pages); ?>
<?php previous_posts_link( __('Posts siguientes').' &rarr;' ); ?><BR><BR>
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer(); ?>