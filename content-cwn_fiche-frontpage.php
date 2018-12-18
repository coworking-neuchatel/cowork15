<?php
/**
 * @package Cowork15
 */
?>

<?php 

$post_classes[] = "fiche";
$post_classes[] = "mini-fiche";


/*
 PS: en mode Mini-Fiche, on veut seulement montrer:
 - la photo ou logo d'entreprise
 - le nom
 - la fonction
 - le nom d'entreprise
*/


$fiche_photo = get_field('fiche_photo');
$fiche_logo = get_field('fiche_logo');

if ($fiche_photo) {

	$post_classes[] = "has-photo";

} elseif ($fiche_logo) {
	
	$post_classes[] = "has-photo";
}

// NOTE: la vérification a lieu en amont, dans la WP_Query. Toutes les fiches traitées par ce template ont acceptation sur "oui".

 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
		<?php 
		
		if ($fiche_photo) {
			
			echo '<div class="fiche-photo">';
												
				echo '<div class="fiche-portrait">';
					
					echo wp_get_attachment_image( 
							$fiche_photo, 
							'medium' );
						echo '</div>';
								
			echo '</div>';
		
		}
				
		?>
	<div class="member-id">
			<?php 
			
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			
			echo '<div class="member-properties">';
			
			if ( get_field('fiche_profession') ) {
				echo '<div>' . get_field('fiche_profession') . '</div>';
			}
			
			if ( get_field('fiche_entreprise') ) { 
							
				echo '<div>' . get_field('fiche_entreprise') . '</div>';
								
			}

			echo '</div><!-- .member-properties -->';

			?>
	</div><!-- .member-id -->

</article><!-- #post-## -->
<?php 

