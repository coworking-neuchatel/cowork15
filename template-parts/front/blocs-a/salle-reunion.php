<?php
/**
 *
 * Salle de réunion: Template part for front page block
 *
 */

$custom_query = new WP_Query( array(
	'post_type' => 'cwn_bloc',
	'title' => 'Salle de réunion',
	'post_status' => array( 'publish' )
) ); 

if ($custom_query->have_posts()) : 

	?><section class="front-item bloc-a"><?php
	
	while( $custom_query->have_posts() ) : $custom_query->the_post();
	
	/* 
	
	Les legos:
	
	- Réserver
	- Photos
	- Détails
	
	Get Custom Fields:
	- salle_reunion_cover (image)
	- salle_reunion_images (gallerie)
	- lien formulaire: salle_reunion_formulaire
	
	*/
	
	$cover_img = get_field('salle_reunion_cover');
		
		if ($cover_img) {
		
			$cover_img_m = wp_get_attachment_image_src( 
				$cover_img, 
				'medium' );
	
			$cover_img_l = wp_get_attachment_image_src( 
				$cover_img, 
				'large' );
				
			$cover_gradient = 'linear-gradient(to right, rgba(255, 255, 255, 0.7), rgba(255, 255, 255, 0.2)), ';
		
			$cover_img_m_style = ' style="background-image:'.$cover_gradient.'url('.$cover_img_m[0].')" ';
			
			$cover_img_l_style = ' style="background-image:url('.$cover_img_l[0].')" ';
	
		}
			
		?>
		
		<h2 id="salle-reunion" class="h2 title-style" <?php echo $cover_img_m_style; ?>><?php the_title(); ?></a></h2>
		
		<div class="bloc-a-content bloc-basic">

		<div class="lego lego-visitez-nous lego-visible">
			<div class="lego-content" <?php echo $cover_img_l_style; ?>>
				<?php 
					
					echo '<a class="button" href="' .get_field('notre_espace_formulaire'). '">Réserver</a></button>';
				
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
				
				if ( function_exists('ms_studio_gallery') ) {
				
				$gallery = ms_studio_gallery( 'salle_reunion_images', 'medium' );
				
				}
				
				if ( !empty( $gallery ) ) {
				
					echo $gallery;
				
				}
				
				?>
			</div>
		</div>
		
		<?php					

		echo '</div>';
		
		edit_post_link( __( 'Edit', 'edin' ).' <i>'.get_the_title().'</i>', '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
			
	endwhile; 
		
	?></section><?php

endif;
