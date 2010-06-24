<?php

/**
* This is your child theme's functions.php file.
* You should make edits and add additional code above this point.
* Only change the functions below if you know what you're doing.
*/

/********************************************************/

/* Localization. */
load_theme_textdomain( 'structure', get_stylesheet_directory() );

/* Actions. */
add_action( 'hybrid_after_page_nav', 'get_search_form' );
add_action( 'widgets_init', 'structure_register_widget_areas' );
add_action( 'hybrid_header', 'structure_get_utility_header' );

/* Filters. */
add_filter( 'breadcrumb_trail', 'structure_disable' );

/**
 * Register additional widget areas for the theme.
 *
 * @since 2.0
 * @uses register_sidebar() Registers a new widget area.
 */
function structure_register_widget_areas() {
	register_sidebar( array( 'name' => __('Utility: Header', 'structure'), 'id' => 'utility-header', 'before_widget' => '<div id="%1$s" class="widget %2$s widget-%2$s"><div class="widget-inside">', 'after_widget' => '</div></div>', 'before_title' => '<h3 class="widget-title">', 'after_title' => '</h3>' ) );
}

/**
 * Checks if the Utility: Header widget area is active.  If it is, it is
 * then wrapped with an appropriate element and displayed.
 *
 * @since 2.0
 * @uses is_active_sidebar() Checks if a widget area is active.
 * @uses dynamic_sidebar() Displays a widget area.
 */
function structure_get_utility_header() {
	if ( !is_active_sidebar( 'utility-header' ) )
		return false;

	echo '<div id="utility-header" class="utility">';
		dynamic_sidebar( 'utility-header' );
	echo '</div>';
}

/**
 * Filter function for disabling variables. It returns false for everything.
 *
 * @since 2.0
 */
function structure_disable( $var ) {
	return false;
}

?>