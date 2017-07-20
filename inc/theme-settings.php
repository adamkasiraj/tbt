<?php
/**
 * Check and setup theme's default settings
 *
 * @package understrap
 *
 */
function setup_theme_default_settings() {

	// check if settings are set, if not set defaults.
	// Caution: DO NOT check existence using === always check with == .
	// Latest blog posts style.
	$understrap_posts_index_style = get_theme_mod( 'understrap_posts_index_style' );
	if ( '' == $understrap_posts_index_style ) {
		set_theme_mod( 'understrap_posts_index_style', 'default' );
	}

	// Sidebar position.
	$understrap_sidebar_position = get_theme_mod( 'understrap_sidebar_position' );
	if ( '' == $understrap_sidebar_position ) {
		set_theme_mod( 'understrap_sidebar_position', 'right' );
	}

	// Container width.
	$understrap_container_type = get_theme_mod( 'understrap_container_type' );
	if ( '' == $understrap_container_type ) {
		set_theme_mod( 'understrap_container_type', 'container' );
	}
}

function theme_settings_page()
{
    ?>
	    <div class="wrap">
	    <h1>Texas Bike Tour Theme Settings</h1>
	    <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
		</div>
	<?php
}

function add_theme_menu_item()
{
	add_menu_page("TBT Settings", "TBT Settings", "manage_options", "theme-panel", "theme_settings_page", null, 99);
}

add_action("admin_menu", "add_theme_menu_item");