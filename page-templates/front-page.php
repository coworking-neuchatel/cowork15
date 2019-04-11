<?php
/**
 * Template Name: Front Page
 *
 * @package Edin
 */

get_header(); ?>

	<?php while ( have_posts() ) : the_post(); ?>

		<?php // get_template_part( 'content', 'hero' ); ?>

	<?php endwhile; ?>
	
	<?php rewind_posts(); ?>
	
	<?php
	
	/*
	
	D'abord quatre sections principales (bloc-a): 
	
	- Notre espace
	- Salle de réunion
	- Travailler 1 jour
	- Système de prix (nos formules)
	
	*/
	
	get_template_part( 'template-parts/blocs/notre-espace' );

	get_cowork_bloc_trio('Salle de réunion');
	
	get_cowork_bloc_trio('Salle de conférence');
	
	get_cowork_bloc_trio('Travailler 1 jour');
		
			
	// Bloc: Prestations
	
	$custom_query = new WP_Query( array(
				'post_type' => 'cwn_bloc',
				// 'page_id' => 2048, // = Prestations
				'title' => 'Prestations',
				'post_status' => array( 'publish' )
		) ); 
		
		if ($custom_query->have_posts()) : 
		
			?><div class="front-item front-item-section"><?php
		
		while( $custom_query->have_posts() ) : $custom_query->the_post();
		
				// title
				
				?>
				<h2 id="prestations" class="h2 title-style"><?php the_title(); ?></a></h2>
				<?php

				the_content();
				
				edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
		
		endwhile; 
			
			?></div><?php
		
		endif;
		
		
		// Bloc: TARIFS
		
			$custom_query = new WP_Query( array(
						'post_type' => 'cwn_bloc',
						'title' => 'Les formules coworking',
						'post_status' => array( 'publish' )
				) ); 
				
				if ($custom_query->have_posts()) : 
				
					?><div class="front-item"><?php
				
				while( $custom_query->have_posts() ) : $custom_query->the_post();
				
						// title
						
						?>
						<h2 id="tarifs" class="h2 title-style"><?php the_title(); ?></a></h2>
						<section class="layer plans tarifs">
						<section>
						<?php
						
						the_content();
	
						?>
						<div style="clear: both;"></div>
						</section>
						</section>
						<?php
						
						edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
				
				endwhile; 
					
					?></div><?php
				
				endif;
				wp_reset_postdata();
		
	
	// Bloc 3: EXTENSIONS
				
	$custom_query = new WP_Query( array(
				'post_type' => 'cwn_bloc',
				'title' => 'Autres prestations',
				'post_status' => array( 'publish' )
		) ); 
		
		if ($custom_query->have_posts()) : 
		
			?><div class="front-item"><?php
		
		while( $custom_query->have_posts() ) : $custom_query->the_post();
		
				// title
				
				?>
				<h2 id="tarifs" class="h2 title-style"><?php the_title(); ?></a></h2>
				
				<section class="layer plans tarifs"><section>
				<?php
				
				// content
				
				the_content();
				
				?>
				<div style="clear: both;"></div>
				</section></section>
				<?php
				
				edit_post_link( __( 'Edit', 'edin' ), '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
		
		endwhile; 
			
			?></div><?php
		
		endif;
		wp_reset_postdata();
		
		
		// FICHES DES MEMBRES
		
		get_template_part( 'template-parts/blocs/nos-membres' );
		
		
		// PARTENARIATS
		
		// Créer un bloc avec répétiteur
		// Cf https://github.com/coworking-neuchatel/cowork15/issues/1
		
		
		
		// EVENEMENTS
		
		// Afficher les événements du coworking
		// Cf https://github.com/coworking-neuchatel/cowork15/issues/3
					
					
	// TEMOIGNAGES
	
    $custom_query = new WP_Query( array(
			'post_type' => 'testimonials',
			'posts_per_page' => 3,
			'orderby' => 'rand'
		) ); 
				
		if ($custom_query->have_posts()) :  ?>
		<section class="testimonials testimonials-home front-item base-margin">
  		
  		<h2 id="temoignages" class="h2 title-style">Témoignages</a></h2>
  		
  		<div class="list-testimonials clear">
  		
    	<?php while( $custom_query->have_posts() ) : $custom_query->the_post(); 
          
          get_template_part( 'content', 'testimonial' );
  		
  		endwhile; ?>
  		</div>
    	
  	</section>
		
		<?php endif;
		wp_reset_postdata();
			
?>
<?php get_footer(); ?>