<?php
/**
 *
 * Template part for displaying front page block
 *
 */
 
 
echo '<section class="front-item bloc-membres base-margin">';

$custom_query = new WP_Query( array(
			'post_type' => 'cwn_bloc',
			'title' => 'Nos membres',
			'post_status' => array( 'publish' )
	) ); 

if ($custom_query->have_posts()) : 
	
	while( $custom_query->have_posts() ) : $custom_query->the_post();
	
	/* 
			Les legos:
			
			- Titre
			- Accroche (Faites connaissance avec nos membres.)
			- Petites Fiches
			- Texte Secondaire (Découvrez leurs compétences: ressources humaines, comptabilité, développement, énergies renouvelables, cryptomonnaies…)
			- Lien > Page Membres
			
			ACF Custom Fields:

			- membres_texte_secondaire
			- membres_texte_lien
	
			*/
			
		?>
		<h2 id="nos-membres" class="h2 title-style"><?php the_title(); ?></a></h2>
		<div class="bloc-membres-content">

		<?php 
		
		the_content();

		echo '</div>'; // bloc-a-content bloc-quad
		
		edit_post_link( __( 'Edit', 'edin' ).' <i>'.get_the_title().'</i>', '<footer class="entry-footer modify-link"><span class="edit-link">', '</span></footer>' );
		
	endwhile; 
	wp_reset_postdata();
endif;

// Query for 5 member cards!

$custom_query = new WP_Query( array(
			'post_type' => 'cwn_fiche',
			'posts_per_page' => 5,
			'post_status' => array( 'publish' ),
			'meta_query' => array(
					array(
						'key'     => 'fiche_acceptation',
						'value'   => 'oui',
						'compare' => '=',
					),
				),
			'orderby' => 'rand',
			'order'   => 'DESC'
	) ); 

if ($custom_query->have_posts()) : 
	
	echo '<div class="grid-fiches">';
	
	while( $custom_query->have_posts() ) : $custom_query->the_post();
				
				get_template_part( 'content', 'cwn_fiche-frontpage' );
				
	endwhile; 
	wp_reset_postdata();
	
	// Et vous?
	
	?>
	<article class="fiche mini-fiche">
		<div class="member-id">
			<h1 class="entry-title">Vous?</h1>
			<div class="member-properties">
				<div>Futur•e coworker</div>
			</div><!-- .member-properties -->
		</div>
	</article>
	<?php
	
	echo '</div>';
	
endif;


//- Texte Secondaire (Découvrez leurs compétences: ressources humaines, comptabilité, développement, énergies renouvelables, cryptomonnaies…)
//- Lien > Page Membres

?>
<p>Découvrez leurs compétences: ressources humaines, comptabilité, développement, énergies renouvelables, cryptomonnaies…</p>

<div class="centered-button"><a class="button button-center" href="/membres/">Découvrir</a></div>
<?php

echo '</section><!-- .bloc-membres -->';


