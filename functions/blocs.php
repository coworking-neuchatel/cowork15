<?php


/*
 * Get Blocs
*/

/**
* Get Cowork Bloc
*
* INPUT:
* @param string $template : name of the bloc-template to use.
* @param string $title : title of the Bloc.
*
* OUTPUT:
* Produces the HTML markup of the bloc.
* 
*/

function get_cowork_bloc( $template, $title ) {

$custom_query = new WP_Query( array(
	'post_type' => 'cwn_bloc',
	'title' => $title,
	'post_status' => array( 'publish' )
) ); 

get_template_part( 'template-parts/blocs/'.$template );

// bloc_cover
// bloc_gallery
// bloc_formulaire

}

/**
* Get Cowork Bloc Trio
*
* INPUT:
* @param string $title : title of the Bloc content.
*
* OUTPUT:
* Produces the HTML markup of the bloc.
* 
*/

function get_cowork_bloc_trio( $title ) {

$custom_query = new WP_Query( array(
	'post_type' => 'cwn_bloc',
	'title' => $title,
	'post_status' => array( 'publish' )
) );

if ($custom_query->have_posts()) : 

	?><?php
	
		while( $custom_query->have_posts() ) : $custom_query->the_post();
		
		/* 
		
		Les legos:
		
		- Réserver
		- Photos
		- Détails
		- Tarifs
		
		Get Custom Fields:
		- bloc_cover (image)  bloc_cover
		- bloc_galerie (gallerie) bloc_galerie
		- Lien vers formulaire = bloc_formulaire
		- Titre du lien = bloc_formulaire_titre
		
		*/
		
			$img = cowork_cover_img('bloc_cover');
			
			echo '<section class="front-item bloc-a bloc-trio">';
			
			echo '<header class="bloc-a-header" '.$img["m_style"].'>';
				
			?>
			
			<h2 id="bloc-<?php 
			
				// The Slug
				// echo $post->post_name;
				echo get_post_field( 'post_name' );
			
			 ?>" class="h2 title-style"><?php the_title(); ?></a></h2>
			</header>
			
			<div class="bloc-a-content bloc-basic">
	
			<div class="lego lego-visitez-nous lego-action lego-visible">
				<div class="lego-content" <?php echo $img["l_style"]; ?>>
					<?php 
						
						echo '<a class="button" href="';
						echo get_field('bloc_formulaire') . '">';
						echo get_field('bloc_formulaire_titre');
						echo '</a></button>';
					
					 ?>
				</div>
			</div>
			
			<div class="lego lego-details">
				<h3 class="lego-title">détails</h3>
				<div class="lego-content">
					<?php 
					
					the_content();
					
					?>
				</div>
			</div>
			
			<div class="lego lego-photos">
				<h3 class="lego-title">photos</h3>
				<div class="lego-content">
					<?php 
					
					// var_dump(get_field( 'bloc_galerie' ));
					
					if ( function_exists('ms_studio_gallery') ) {
					
					// function defined in : MS-Studio Gallery
					
					$gallery = ms_studio_gallery( 'bloc_galerie', 'large' );
					
					} else {
					
						echo '<!-- please activate ms_studio_gallery. -->';
					}
					
					if ( !empty( $gallery ) ) {
					
						echo $gallery;
					
					} else {
					
						echo '<!-- $gallery is empty. -->';
					
					}
					
					?>
				</div>
			</div>
			
			<?php					
	
			echo '</div>'; // bloc-a-content bloc-basic
			
			edit_post_link( __( 'Edit', 'edin' ).' <i>'.get_the_title().'</i>', '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
				
		endwhile; 
			
		?></section><?php
	
	endif;

}

