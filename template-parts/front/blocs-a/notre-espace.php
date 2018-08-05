<?php
/**
 *
 * Template part for displaying front page block
 *
 */

$custom_query = new WP_Query( array(
	'post_type' => 'cwn_bloc',
	'title' => 'Notre espace',
	'post_status' => array( 'publish' )
) ); 

if ($custom_query->have_posts()) : 
	
	while( $custom_query->have_posts() ) : $custom_query->the_post();
	
	/* 
			
			Les legos:
			
			- Visite guidée
			- Photos
			- Visite 360° 
			- Carte google
			
			ACF Custom Fields:
			- 
			- notre_espace_cover (image)
			- notre_espace_images (gallerie)
			- visite_3d
			- carte_google (Zone de texte)
			- notre_espace_formulaire
	
			*/
	
	$cover_img = get_field('notre_espace_cover');
	
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
	
	echo '<section class="front-item bloc-a bloc-a-notre-espace" >';
	
		?>
		<h2 id="notre-espace" class="h2 title-style" <?php echo $cover_img_m_style; ?>><?php the_title(); ?></a></h2>
		<div class="bloc-a-content bloc-quad">

		<div class="lego lego-visitez-nous lego-visible">
			<div class="lego-content" <?php echo $cover_img_l_style; ?>>
				<?php 
				
					echo '<a class="button" href="' .get_field('notre_espace_formulaire'). '">Visitez-nous</a></button>';
				
				 ?>
			</div>
		</div>
		
		<div class="lego lego-photos">
			<h3 class="lego-title">photos</h3>
			<div class="lego-content">
				<?php 
				
				if ( function_exists('ms_studio_gallery') ) {
				
				$gallery = ms_studio_gallery( 'notre_espace_images', 'medium' );
				
				}
				
				if ( !empty( $gallery ) ) {
				
					echo $gallery;
				
				}
				
				?>
			</div>
		</div>
		
		<div class="lego lego-visite-360">
			<h3 class="lego-title">visite 360°</h3>
			<div class="lego-content">
				<?php 
				
				$visite_3d = get_field('visite_3d');
				
				echo $visite_3d;
				
				 ?>
			</div>
		</div>
		<?php 
		
		/*
		 Carte Google
		*/
		
		$carte_google_cover = get_field('carte_google_cover');
		
		$carte_google = get_field('carte_google');
		
		 ?>
		<div class="lego lego-carte-google">
			<h3 class="lego-title">carte google</h3>
			<div class="lego-content">
				<?php 
				
				if ($carte_google_cover) {
				
				echo wp_get_attachment_image( 
					$carte_google_cover, 
					'medium' );
				
				}
				
				echo $carte_google;
				
				 ?>
			</div>
		</div>
		
		<?php					

		echo '</div>';
		
		edit_post_link( __( 'Edit', 'edin' ).' <i>'.get_the_title().'</i>', '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
			
	endwhile; 
		
	?></section><?php

endif;
