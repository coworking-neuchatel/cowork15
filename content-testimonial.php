<?php
/**
 * @package Cowork15
 */
?>

<?php 

$testimonial_infos = get_post_meta($post->ID, 'infos', true);
    
$testimonial_url = get_post_meta($post->ID, 'url', true);

$testimonial_url = preg_replace("(https?://)", "", $testimonial_url );

?>

<article class="testimonial">
	
	<div class="entry-content"><?php the_content(); ?></div><!-- .entry-content -->
	
  <?php if ( has_post_thumbnail() ) : ?>
	<div class="entry-img">
		<figure class="img">
			<?php the_post_thumbnail('square-thumb'); ?>
		</figure>
	</div><!-- .entry-img -->
	<?php endif; ?>
	
	<div class="entry-meta">
		
		<p class="name"><?php the_title(); ?>
		
		<?php if ( ! empty ( $testimonial_infos ) ) : 
			// Display post_meta 'infos' only if it has value
		?>
		
		<p class="infos">
			
			<?php if ( ! empty ( $testimonial_url ) ) : 
				// Add the url only if post_meta 'url' has value
			?>
				<a href="http://<?php echo $testimonial_url ?>"><?php echo $testimonial_infos ?></a>
			<?php else : 
				// else display info without url
        echo $testimonial_infos ?>
        
			<?php endif; ?>
			
	  </p>
		<?php endif; ?>
		
	</div><!-- .entry-meta -->
	
</article><!-- .testimonial -->