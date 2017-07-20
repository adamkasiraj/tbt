<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

// $container = get_theme_mod( 'understrap_container_type' );
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?> - <?php bloginfo( 'description' ); ?>">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">

	<!-- ******************* The Navbar Area ******************* -->
	<div class="wrapper-fluid wrapper-navbar bg-inverse" id="wrapper-navbar">

		<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
		'understrap' ); ?></a>

			<?php if ( 'container' == $container ) : ?>
				<div class="container">
			<?php endif; ?>
				
				<nav class="navbar navbar-toggleable-md navbar-inverse pb-0">

					<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon"></span>
					</button>

					<!-- Your site title as branding in the menu -->
					<?php if ( ! has_custom_logo() ) { ?>

						<a class="navbar-brand" 
							rel="home" 
							href="<?php echo esc_url( home_url( '/' ) ); ?>" 
							title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>"
						>
							<?php bloginfo( 'name' ); ?></a>		
					
					<?php } else {
						the_custom_logo();
					} ?><!-- end custom logo -->

					<!-- The WordPress Menu goes here -->
					<?php wp_nav_menu(
						array(
							'theme_location'  => 'primary',
							'container_class' => 'collapse navbar-collapse',
							'container_id'    => 'navbarNavDropdown',
							'menu_class'      => 'navbar-nav',
							'fallback_cb'     => '',
							'menu_id'         => 'main-menu',
							'walker'          => new WP_Bootstrap_Navwalker(),
						)
					); ?>

					<a class="btn btn-primary ml-auto hidden-md-down" href="#">Lets Ride</a>





				</nav><!-- .site-navigation -->
			
		<?php if ( 'container' == $container ) : ?>
			</div><!-- .container -->
		<?php endif; ?>

	</div><!-- .wrapper-navbar end -->
	<div class="container">
		<div class="card cta-callout">
			<div class="card-header">
				<div>Customize a ride</div>
				<a class="btn btn-primary btn-cta" href="#">Lets Ride</a>
			</div>
		</div>
	</div>

