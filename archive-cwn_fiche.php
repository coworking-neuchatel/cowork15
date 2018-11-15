<?php
/**
 * The template for displaying Archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package Edin
 */

get_header(); 

?>

	<div class="hero <?php echo edin_additional_class(); ?>">
		<?php if ( have_posts() ) : ?>
			<div class="hero-wrapper">
				<h1 class="page-title">Les membres</h1>
			</div>
		<?php endif; ?>
	</div><!-- .hero -->

	<div class="content-wrapper clear">

		<div id="primary" class="content-area">
			<main id="main" class="site-main" role="main">
				<div class="grid-fiches">

				<?php if ( have_posts() ) : ?>

					<?php while ( have_posts() ) : the_post(); ?>
						
						<?php
						
							// Page Membres:
							// 1) On affiche 4 membres pris aléatoirement
							// la requête est modifiée avec pre_get
							
							get_template_part( 'content', 'cwn_fiche' );
							
							// ajouter à la liste des IDs à exclure
							
							// 2) Afficher la liste de tous les autres profils (portraits)
							
							// 3) On liste les domaines de compétence
							// comme dans le modèle biblio
						
						endwhile; 
						else : 
						get_template_part( 'content', 'none' ); 
						endif; 
					
					?>
				</div>
				
				<div class="grid-fiches">
					<h2>Domaines de compétence</h2>
					<ul class="biblio-tag-cloud text clear">
					<?php 
					      		
					$args = array(
					    'show_option_all'    => '',
					    	'orderby'            => 'name',
					    	'order'              => 'ASC',
					    	'style'              => 'list',
					    	'show_count'         => 0,
					    	'hide_empty'         => 1,
					    	'use_desc_for_title' => 0,
					    	'exclude'            => '',
					    	'exclude_tree'       => '',
					    	'hierarchical'       => 0,
					    	'title_li'           => '',
					    	'number'             => null,
					    	'echo'               => 1,
					    	'depth'              => 0,
					    	'current_category'   => 0,
					    	'pad_counts'         => 0,
					    	'taxonomy'           => 'cwn_competence',
					    	'walker'             => null
					   ); 
					   
					wp_list_categories( $args );
								 
					?>
					</ul>
				</div>

			</main><!-- #main -->
		</div><!-- #primary -->

<?php get_footer(); ?>