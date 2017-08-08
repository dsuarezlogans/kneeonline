<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package footankle
 */

/* BORRAR PARA LANZAMIENTO */
/*if ( !in_array( $_SERVER['REQUEST_URI'], array( '/login/', '/wp-admin/' ) ) && !(is_user_logged_in()) ) {

	wp_safe_redirect( '/landing/' );
	exit;

}*/



?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Cache-Control" content="no-cache" />
<meta http-equiv="Pragma" content="no-cache" />
<meta http-equiv="Expires" content="0" />
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/js/jquery.horizontal.scroll.js"></script>
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<link rel="icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon" />
<link rel="apple-touch-icon" href="<?php bloginfo('template_directory'); ?>/img/favicon128.ico" type="image/x-icon" />
<link href='https://fonts.googleapis.com/css?family=Lato:300,400,700,900' rel='stylesheet' type='text/css'>
<link href='<?php bloginfo('template_directory'); ?>/js/jquery.horizontal.scroll.css' rel='stylesheet' type='text/css'>

<?php wp_head(); ?>
</head>

<script language="javascript">
    /*$(document).ready(function() {
      $('#show-login').click(function() {
			$("#greeting-mini").toggle();
			$("#login-mini").fadeIn("slow");
			return false;
      });
      $('#close-login').click(function() {
			$("#login-mini").toggle();
			$("#greeting-mini").fadeIn("slow");
			return false;
      });
    });*/
document.onmousedown=disableclick;
status="Click derecho desactivado";
function disableclick(event)
{
  if(event.button==2)
   {
     alert(status);
     return false;
   }
}
</script>

<body <?php body_class(); ?>  oncontextmenu="return false">
<script>
  window.fbAsyncInit = function() {
    FB.init({
      appId      : '1089028534455591',
      xfbml      : true,
      version    : 'v2.3'
    });
  };

  (function(d, s, id){
     var js, fjs = d.getElementsByTagName(s)[0];
     if (d.getElementById(id)) {return;}
     js = d.createElement(s); js.id = id;
     js.src = "//connect.facebook.net/en_US/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
   }(document, 'script', 'facebook-jssdk'));
</script>
<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Ir al contenido', 'footankle' ); ?></a>

  <?php
      if(!is_front_page()){
        $header_class= "bck-pages-color";
      }
   ?>

<div id="tophead" class="top-header <?php echo $header_class?> fixed-header">

  <div class="user-menu">
    <div class="user-menu-item">
    <?php //do_action('icl_language_selector'); ?>
      <div class="mini-item" id="greeting-mini">
        <?php if ( is_user_logged_in() ) {

            $user_info = get_userdata(get_current_user_id());
              $username = $user_info->user_login;
              $first_name = $user_info->first_name;
              $last_name = $user_info->last_name;
            echo '<span id="namegreeting">'.__('Hola').', ';
            if ($first_name != '')
              echo $first_name . ' ' . $last_name;
            else
              echo $username;
            ?>
            <a title="<?php _e('Log out','footankle'); ?>" href="<?php echo wp_logout_url('/'); ?>"><img src="<?php bloginfo('template_directory'); ?>/img/logout_02_W_100px.png" align="absmiddle" width="20" height="20" style="margin-left:5px;"></a>
         <?php } else { ?>
         <a href="<?php echo wp_registration_url(); ?>"><?php _e('Registrate','footankle'); ?></a> <img src="<?php bloginfo('template_directory'); ?>/img/57_key_W_100px.png" align="absmiddle" width="30" height="20" style="margin-left:5px;margin-right:5px;"> <a id="show-login" href="<?php echo wp_login_url(); ?>"><?php _e('Ingresar','footankle') ?></a>
       <?php } ?>
      </div>
      <?php if ( !is_user_logged_in() ) { ?>
        <div class="mini-item" id="login-mini">
          </div>
        <?php } ?>
    </div>
  </div>

  <div class="">

    <header id="masthead" class="site-header" role="banner">
      <div class="site-branding">
        <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" class="logo_btn"><img id="logo-img" src="<?php bloginfo('template_directory'); ?>/img/logo-knee.png" width="100" height="59" alt="Foot & Ankle"></a>
      <nav id="site-navigation" class="main-navigation" role="navigation">
        <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><img src="<?php bloginfo('template_directory'); ?>/img/menu-toggle.png" align="top" width="10px" height="10px"> &nbsp; <?php _e( 'Menu', 'footankle' ); ?></button>
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
        <?php get_search_form(); ?>
      </nav><!-- #site-navigation -->

      </div><!-- .site-branding -->

    </header><!-- #masthead -->

  </div><!-- .fixed-header -->

</div><!--.top-header-->

	<div id="content" class="site-content">
		<?php if (!is_front_page()) {  ?>
		<?php echo'<div class="header-separator"></div>';
          include "inc/user-menu.php" ?>
		<?php } ?>
