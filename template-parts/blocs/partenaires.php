<?php
/**
 *
 * Template part for displaying front page bloc: Partenaires
 *
 */
 
 
echo '<section class="front-item bloc-partenaires base-margin">';

$custom_query = new WP_Query( array(
			'post_type' => 'cwn_bloc',
			'title' => 'Partenaires',
			'post_status' => array( 'publish' )
	) ); 

if ($custom_query->have_posts()) : 
	
	while( $custom_query->have_posts() ) : $custom_query->the_post();
	
		?>
		<h2 id="partenaires" class="h2 title-style"><?php the_title(); ?></a></h2>
		<div class="bloc-partenaires-content">

		<?php 
		
		the_content();

		echo '</div>'; // bloc-a-content bloc-quad
				
		$cwn_partenaires =  get_post_meta(
			$post->ID, 
			'cwn_repeater_partenaires', 
			false);
			
		if ( !empty($cwn_partenaires) ) {
				  		
				if( have_rows('cwn_repeater_partenaires') ):
				
					echo '<div class="bloc-partenaires-liste">';
				
					while( have_rows('cwn_repeater_partenaires') ): the_row(); 
					
						echo '<div class="bloc-partenaires-item">';
						
						echo '<a href="'.get_sub_field('cwn_lien_partenaire').'">';
						
					 	$img = get_sub_field('cwn_logo_partenaire');
					 	if ($img) {
					 	echo wp_get_attachment_image( 
					 	 $img["ID"], 
					 	 'medium' 
					 	 );
					 	}					 
					  echo '</a>';
					  					 
					 echo '<p>'.get_sub_field('cwn_texte_partenaire');
					 if (!empty(get_sub_field('cwn_lien_partenaire'))) {
					 	echo '<a href="'.get_sub_field('cwn_lien_partenaire').'">';
					 	echo '<span> &rarr; site web</span>';
					 	echo '</a>';
					 }
					 echo '</p>';
					 
					 echo '</div>';
				
					endwhile;
					
					echo '</div>'; // bloc-partenaires-liste
						
				endif;   
	
		}
		
		
		
		edit_post_link( __( 'Edit', 'edin' ).' <i>'.get_the_title().'</i>', '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
		
	endwhile; 
	wp_reset_postdata();
endif;


echo '</section><!-- .bloc-partenaires -->';


