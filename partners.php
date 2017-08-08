<?php
/*
Template Name: Partners Page
*/
get_header(); ?>

	<div id="primary" class="posts-area white">
		<main id="main" class="posts-inside" role="main"><BR>

	<header class="entry-header"><h1 class="foot"><?php _e('Creadores','footankle'); ?></h1></header>

	<?php $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$args = array( 'post_type' => 'partner', 'posts_per_page' => 3, 'paged' => $paged );
		$wp_query = new WP_Query($args);
		$myCounter = 0;
		echo '<div class="faculty-block about">';
		while ( have_posts() ) : the_post();  ?>
			<div class="boxgrid captionfull about">

			<!--header class="entry-header"-->
				<?php the_post_thumbnail( 'custom-faculty' ); ?>

			<!--/header--><!-- .entry-header -->
	<!--div class="entry-content" style="padding-left:10px; padding-right:10px;">

		<?php the_content() ?>
	</div-->

				<div class="cover boxcaption about">
					<?php
						$texto = get_the_content(__('Full profile >','footankle'));
						$twitter = types_render_field("twitter", array("output"=>"raw"));
						$facebook = types_render_field("facebook", array("output"=>"raw"));
						$linkedin = types_render_field("linkedin", array("output"=>"raw"));
						$website = types_render_field("website", array("output"=>"raw"));
					?>
					<?php if ($twitter != '') { ?>
						<a class="slide-social-link about" target="_blank" href="http://twitter.com/<?php echo $twitter ?>"><img class="slide-icon about" src="<?php bloginfo('template_directory'); ?>/img/43_twitter_circle_G_100px.png" ></a>
					<?php } ?>
					<?php if ($facebook != '') { ?>
						<a class="slide-social-link about" target="_blank" href="<?php echo $facebook ?>"><img class="slide-icon about" src="<?php bloginfo('template_directory'); ?>/img/41_facebook_circle_G_100px.png" ></a>
					<?php } ?>
					<?php if ($linkedin != '') { ?>
						<a class="slide-social-link about" target="_blank" href="<?php echo $linkedin ?>"><img class="slide-icon about" src="<?php bloginfo('template_directory'); ?>/img/42_linkedin_circle_G_100px.png" ></a>
					<?php } ?>
					<?php if ($website != '') { ?>
						<a class="slide-social-link about" target="_blank" href="<?php echo $website ?>"><img class="slide-icon about" src="<?php bloginfo('template_directory'); ?>/img/40_link_circle_G_100px.png" ></a>
					<?php } ?>

				</div>

			</div>

	<?php endwhile;
		echo '</div>';
	?>

	<div class="faculty-details">
		<div class="details-box">
			<div class="detail1">
				<h2 id="details-name"></h2>
			</div>
			<div class="detail2">
				<p id="details-text"><p>
				<p style="float:right; margin: 0 0 15px 0;"><a id="detail-permalink" href><?php _e('Read more >','footankle'); ?></a></p><br clear="right">
			</div>
			<div class="detail3">
				<ul style="padding:0px; margin:0px 0 0 20px;list-style:none;">
					<li id="li-twitter" style="padding-top:5px;"><img src="<?php bloginfo('template_directory'); ?>/img/47_solo_twitter_B_100px.png" width="28" height="28" align="absmiddle"> <span id="details-twitter"></span></li>
					<li id="li-facebook" style="padding-top:7px;"><img src="<?php bloginfo('template_directory'); ?>/img/45_solo_face_B_100px.png" width="28" height="28" align="absmiddle"> <span id="details-facebook"></span></li>
					<li id="li-linkedin" style="padding-top:7px;"><img src="<?php bloginfo('template_directory'); ?>/img/46_solo_linkedin_B_100px.png" width="28" height="28" align="absmiddle"> <span id="details-linkedin"></span></li>
					<li id="li-website" style="padding-top:7px;"><img src="<?php bloginfo('template_directory'); ?>/img/44_solo_link_B_100px.png" width="28" height="28" align="absmiddle"> <span id="details-website"></span></li>
				</ul>
			</div>
		</div>
	</div>

	<div class="faculty-block last">
	<?php $contador = 0;
		while ( have_posts() ) : the_post();  ?>
			<div class="faculty-item mobile">
				<div class="only-mobile">
						<div class="mobile-photo">
							<?php the_post_thumbnail( 'custom-faculty' ); ?>
						</div>
				</div>
				<div class="non-mobile">
					<center><h3><?php the_title(); ?></h3></center>
					<div align="center" id="mobile-links">
						<?php
						$twitter = types_render_field("twitter", array("output"=>"raw"));
						$facebook = types_render_field("facebook", array("output"=>"raw"));
						$linkedin = types_render_field("linkedin", array("output"=>"raw"));
						$website = types_render_field("website", array("output"=>"raw"));
						?>
						<?php if ($twitter != '') { ?><a target="_blank" href="http://twitter.com/<?php echo $twitter ?>"><img class="icon-about" src="<?php bloginfo('template_directory'); ?>/img/47_solo_twitter_B_100px.png" ></a><?php } ?>
						<?php if ($facebook != '') { ?><a target="_blank" href="<?php echo $facebook ?>"><img class="icon-about" src="<?php bloginfo('template_directory'); ?>/img/45_solo_face_B_100px.png" ></a><?php } ?>
						<?php if ($linkedin != '') { ?><a target="_blank" href="<?php echo $linkedin ?>"><img class="icon-about" src="<?php bloginfo('template_directory'); ?>/img/46_solo_linkedin_B_100px.png" ></a><?php } ?>
						<?php if ($website != '') { ?><a target="_blank" href="<?php echo $website ?>"><img class="icon-about" src="<?php bloginfo('template_directory'); ?>/img/44_solo_link_B_100px.png" ></a><?php } ?>
					</div>
					<p align="left"><?php echo types_render_field("minibio", array("output"=>"raw")); ?></p>
					<p style="margin-top:-20px;"><a href="<?php echo get_permalink(); ?>"><?php _e('Read more >', 'footankle'); ?></a></p>
					<?php if ($contador < 2) { ?><BR><BR><?php };
					 $contador = $contador + 1; ?>
				</div>

			</div>
	<?php endwhile; ?>
	</div>

<!-- then the pagination links -->
		</main><!-- #main -->
	</div><!-- #primary -->

<script type="text/javascript">
$(document).ready(function(){
	$('.faculty-details').click(function(){
		$('.faculty-details').hide();
		$('.details-box').hide();
		//$(this).hide();
	});
	$('.faculty-name').click(function() {
		var nombre = $(this).attr('nombre');
		var texto = $(this).attr('texto');
		var twitter = $(this).attr('twitter');
		var facebook = $(this).attr('facebook');
		var linkedin = $(this).attr('linkedin');
		var website = $(this).attr('website');
		var theurl = $(this).attr('theurl');

		$('#details-name').html( nombre );
		$('#details-text').html( texto );
		if (twitter != '') {
			$('#details-twitter').html( '<a target="_blank" href="http://twitter.com/' + twitter + '" class="details-social twitter">Twitter</a>' );
			$('#li-twitter').show();
		}
		else	{
			$('#details-twitter').html('');
			$('#li-twitter').hide();
		}
		if (facebook != '') {
			$('#details-facebook').html( '<a target="_blank" href="' + facebook + '" class="details-social facebook">Facebook</a>' );
			$('#li-facebook').show();
		}
		else {
			$('#details-facebook').html('');
			$('#li-facebook').hide();
		}
		if (linkedin != '') {
			$('#details-linkedin').html( '<a target="_blank" href="' + linkedin + '" class="details-social twitter">LinkedIn</a>' );
			$('#li-linkedin').show();
		}
		else {
			$('#details-linkedin').html( '');
			$('#li-linkedin').hide();
		}
		if (website != '') {
			$('#details-website').html( '<a target="_blank" href="' + website + '" class="details-social twitter">Website</a>' );
			$('#li-website').show();
		}
		else {
			$('#details-website').html( '');
			$('#li-website').hide();
		}
		$('#detail-permalink').attr("href", theurl);

		$('.faculty-details').show();
		$('.details-box').css( "display", "inline-block" );
		return false;
	});

    //To switch directions up/down and left/right just place a "-" in front of the top/left attribute
    //Vertical Sliding
    $('.boxgrid.slidedown').hover(function(){
        $(".cover", this).stop().animate({top:'-260px'},{queue:false,duration:300});
    }, function() {
        $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:300});
    });
    //Horizontal Sliding
    $('.boxgrid.slideright').hover(function(){
        $(".cover", this).stop().animate({left:'325px'},{queue:false,duration:300});
    }, function() {
        $(".cover", this).stop().animate({left:'0px'},{queue:false,duration:300});
    });
    //Diagnal Sliding
    $('.boxgrid.thecombo').hover(function(){
        $(".cover", this).stop().animate({top:'160px', left:'325px'},{queue:false,duration:300});
    }, function() {
        $(".cover", this).stop().animate({top:'0px', left:'0px'},{queue:false,duration:300});
    });
    //Partial Sliding (Only show some of background)
    $('.boxgrid.peek').hover(function(){
        $(".cover", this).stop().animate({top:'90px'},{queue:false,duration:160});
    }, function() {
        $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
    });
    //Full Caption Sliding (Hidden to Visible)
    $('.boxgrid.captionfull').hover(function(){
        $(".cover", this).stop().animate({top:'0px'},{queue:false,duration:160});
    }, function() {
        $(".cover", this).stop().animate({top:'293px'},{queue:false,duration:160});
    });
    //Caption Sliding (Partially Hidden to Visible)
    $('.boxgrid.caption').hover(function(){
        $(".cover", this).stop().animate({top:'160px'},{queue:false,duration:160});
    }, function() {
        $(".cover", this).stop().animate({top:'220px'},{queue:false,duration:160});
    });
});
</script>
<?php get_footer(); ?>
