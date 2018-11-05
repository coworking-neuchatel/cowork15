<?php

/**
 * Text Domain
 */
 

function my_child_theme_setup() {
    load_theme_textdomain( 'edin', get_stylesheet_directory() . '/languages' );
    
    register_nav_menus( array(
    	'membres_neuch'   => __( 'Membres Neuchâtel', 'cowork' ),
    ) );
   
}
add_action( 'after_setup_theme', 'my_child_theme_setup' );



add_action( 'widgets_init', 'cowork_register_sidebar' );
if ( ! function_exists( 'cowork_register_sidebar' ) ) :
	/**
	 * Register the sidebars
	 */
	function cowork_register_sidebar() {
		
		// Espace Sponsors
//		register_sidebar( array(
//			'name'=> __( 'Powered By', 'cowork' ),
//			'id' => 'powered_sidebar',
//			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
//			'after_widget' => '</aside>',
//			'before_title' => '<h3 class="widgettitle">',
//			'after_title' => '</h3>'
//		) );	
		
		// Hero pour Front Page
		register_sidebar( array(
			'name'=> __( 'FrontPage Gallery', 'cowork' ),
			'id' => 'frontpage_gallery',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widgettitle">',
			'after_title' => '</h3>'
		) );
			
	}

endif; // cowork_register_sidebar
 
 
 /* we wanted to allow any logged-in user to view our private posts and pages
  * http://stephanieleary.com/2010/02/changing-roles-capabilities/
  */
  // allow subscribers to view private posts and pages
//  $PrivateRole = get_role('subscriber');
//  $PrivateRole -> add_cap('read_private_pages');
//  $PrivateRole -> add_cap('read_private_posts');
  
  // N.B.: This setting is saved to the database (in table wp_options, field wp_user_roles), so it might be better to run this on theme/plugin activation
  // http://codex.wordpress.org/Function_Reference/add_cap
  
  
  function the_title_trim($title) {
  	$title = esc_attr($title);
  	$findthese = array(
  		'#Privé&nbsp;:#'
  	);
  	$replacewith = array(
  		'' // What to replace "Private:" with
  	);
  	$title = preg_replace($findthese, $replacewith, $title);
  	return $title;
  }
  add_filter('the_title', 'the_title_trim');
  

/*
 * Prevent errors if ACF is disabled
*/

if ( ! function_exists ( 'get_field' ) ) {
    function get_field( $key = '' ) {
        
        $field = get_post_meta( get_the_ID(), $key, true );
        
        return $field;
        
    }
}

/*
 * Produce cover image
*/

function cowork_cover_img($field) {

	$img = array();
	
	$cover_img = get_field($field);
		
	if ($cover_img) {
	
		$img = array();
	
		$img["m"] = wp_get_attachment_image_src( 
			$cover_img, 
			'medium' );

		$img["l"] = wp_get_attachment_image_src( 
			$cover_img, 
			'large' );
			
		$img["gradient"] = 'linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.2)), ';
	
		$img["m_style"] = ' style="background-image:'.$img["gradient"].'url('.$img["m"][0].')" ';
		
		$img["l_style"] = ' style="background-image:url('.$img["l"][0].')" ';

	}
	
	return $img;
	
}


