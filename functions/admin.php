<?php


/* Dashboard improvement
******************************/

function tabula_remove_dashboard_widgets() {
	// Globalize the metaboxes array, this holds all the widgets for wp-admin
	global $wp_meta_boxes;
	
	// unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
	
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press'] );
//
//	unset( $wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity'] );

	// RSS feeds:
	unset( $wp_meta_boxes['dashboard']['side']['core']['dashboard_primary'] );

}
add_action( 'wp_dashboard_setup', 'tabula_remove_dashboard_widgets' );


function cowork_generate_menu($menu_name) {
	
	if ( has_nav_menu( $menu_name ) ) : ?>
		<nav class="member-navigation" role="navigation">
			<?php
				wp_nav_menu( array(
					'theme_location'  => $menu_name,
					'menu_class'      => 'clear',
					'depth'           => 1,
				) );
			?>
		</nav><!-- .footer-navigation -->
	<?php endif;

}


/*
 * Output Favicon
 */
 
function favicon() {
//	if ( is_admin() ) {
//  	echo '<link rel="apple-touch-icon" href="'.get_stylesheet_directory_uri().'/img/favicon/favicon-edit.png" />';
//  	echo '<link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/img/favicon/favicon-edit.png" />';
//  }
 }
 add_action('wp_head', 'favicon');
 
 function favicon_admin() {
 	echo '<link rel="apple-touch-icon" href="'.get_stylesheet_directory_uri().'/img/favicon/favicon-edit.png" />';
 	echo '<link rel="icon" type="image/png" href="'.get_stylesheet_directory_uri().'/img/favicon/favicon-edit.png" />';
 }
 add_action( 'admin_head', 'favicon_admin' );
 

// end of file