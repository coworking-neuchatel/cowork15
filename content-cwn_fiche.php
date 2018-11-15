<?php
/**
 * @package Cowork15
 */
?>

<?php 

$post_classes[] = "fiche";

$fiche_photo = get_field('fiche_photo');
$fiche_logo = get_field('fiche_logo');

if ($fiche_photo) {

	$post_classes[] = "has-photo";

} elseif ($fiche_logo) {
	
	$post_classes[] = "has-photo";
}

 ?>

<article id="post-<?php the_ID(); ?>" <?php post_class($post_classes); ?>>
		<?php 
		
		if (in_array( "has-photo", $post_classes)) {
			
			echo '<div class="fiche-photo">';
			
			if ($fiche_photo) {
			
				echo '<div class="fiche-portrait">';

				echo wp_get_attachment_image( 
					$fiche_photo, 
					'medium' );
				echo '</div>';
	
			}
			
			if ($fiche_logo) {
				
				echo '<div class="fiche-logo">';
			
				echo wp_get_attachment_image( 
								$fiche_logo, 
								'medium' );
				echo '</div>';
				
			}
			
			echo '</div>';
		
		}
				
		?>
	<div class="member-id">
			<?php 
			
			the_title( '<h1 class="entry-title">', '</h1>' ); 
			
			echo '<div class="member-properties">';
			
			if ( get_field('fiche_profession') )
			{
				echo '<div>' . get_field('fiche_profession') . '</div>';
			}
			
			if ( get_field('fiche_entreprise') )
			{
				echo '<div>' . get_field('fiche_entreprise') . '</div>';
			}
			
			
			if ( get_field('fiche_anniv') )
			{
				echo '<div>Anniversaire: ' . get_field('fiche_anniv') . '</div>';
			}
			
			$terms_competences = get_the_term_list( 
				$post->ID, 
				'cwn_competence', 
				'Compétences: ', ', ', '' 
			);
			
			if ( ($terms_competences) ) {
					
					echo '<div class="competences">';
			
					echo $terms_competences;
					
					echo '</div>';
			
			}
			
			if ( get_field('fiche_url') )
			{
				echo '<div><a href="' . get_field('fiche_url') . '">' . get_field('fiche_url') . '</a></div>';
			}
			
			if ( get_field('fiche_email') )
			{
				echo '<div>' . get_field('fiche_email') . '</div>';
			}
			
			if ( get_field('fiche_tel') )
			{
				echo '<div>' . get_field('fiche_tel') . '</div>';
			}
			
			echo '</div><!-- .member-properties -->';
			
			// Second Section
			// ***************
			
			if ( get_field('fiche_raison') )
			{
				echo '<h2 class="sub-title">Raison du choix:</h2>';
				
				echo '<div class="member-properties">';
				
				echo '<p> ' . get_field('fiche_raison') . '</p>';
				
				
				
				if ( get_field('fiche_citation') ) {
					echo '<div>Citation: ' . get_field('fiche_citation') . '</div>';
				}
				
				echo '</div><!-- .member-properties -->';
			}
			
			edit_post_link( __( 'Edit', 'edin' ), '<div class="modify-linkx"><span class="edit">', '</span></div>' );
			
			?>
	</div><!-- .member-id -->
	<?php 
	
	
	
	 ?>
</article><!-- #post-## -->
