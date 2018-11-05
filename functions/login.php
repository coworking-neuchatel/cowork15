<?php
/**
 * Cowork Theme Login Page
 *
 * @package Cowork
 */

/* Custom Login Screen
***************************************/

function cowork_login_screen() {
	echo '<link rel="stylesheet" type="text/css" href="' . get_stylesheet_directory_uri(). '/css/modular/login.css" />';
}
add_action( 'login_head', 'cowork_login_screen' );

// src: http://codex.wordpress.org/Customizing_the_Login_Form
// change the link values so the logo links to your WordPress site

function cowork_login_logo_url() {
    return get_bloginfo( 'url' );
}
add_filter( 'login_headerurl', 'cowork_login_logo_url' );


function cowork_login_logo_url_title() {
    return 'Coworking Neuchâtel';
}
add_filter( 'login_headertitle', 'cowork_login_logo_url_title' );
