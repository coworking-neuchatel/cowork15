<?php
/**
* Pre-Get Posts
* Change display of posts loop
* Number of posts in archive pages
*
* @package Cowork
 */

function cowork_page_membres( $query ) {

  if ( is_archive( 'cwn_fiche' ) ) {
  	// $query->set( 'posts_per_page', 1);
  	$query->set( 'orderby', 'rand');
  }
 
}
add_filter( 'pre_get_posts', 'cowork_page_membres' );


