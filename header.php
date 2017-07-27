<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package understrap
 */

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
	<link rel="shortcut icon" href="<?php the_field('settings_favicon', 'option'); ?>" type="image/x-icon" />
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div class="hfeed site" id="page">
	<header id="site-header">

		<section class="masthead hidden-md-down container-fluid" style="background:url('<?php the_field('settings_masthead', 'option'); ?>')no-repeat center; background-size:cover;" role="banner">
			<div class="overlay"></div>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
				<img class="mx-auto d-block site-logo" src="<?php the_field('settings_logo', 'option'); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?> logo" />	
			</a>
		</section>

		<!-- ******************* The Navbar Area ******************* -->
		<div class="wrapper-fluid wrapper-navbar bg-inverse" id="wrapper-navbar">

			<a class="skip-link screen-reader-text sr-only" href="#content"><?php esc_html_e( 'Skip to content',
			'understrap' ); ?></a>

				<div class="container-fluid">
					
					<nav class="navbar navbar-toggleable-md navbar-inverse px-0">

						<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>

						<!-- Your site title as branding in the menu -->
						<?php if ( ! has_custom_logo() ) { ?>

							<a class="navbar-brand hidden-lg-up" 
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

						<?php
							// Display header nav widget area 
							if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('nav-sidebar') ) : endif; 
						?>





					</nav><!-- .site-navigation -->
				
			</div><!-- .container -->


		</div><!-- .wrapper-navbar end -->
	</header>

	<?php 
		// Display Header Callout widget area on non home pages
		if ( ( !is_front_page() && !is_home() ) && ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('header-callout') ) ) : endif; 
	?>

