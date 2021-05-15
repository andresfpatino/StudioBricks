<?php 
/*
	[social-share fb="" in="" tw="" mail="" wp=""]
	-- Para mostraron los parametros asignar el atributo correspondiente y el valor "true"
	--- Ejemplo: [social-share fb="true" wp="true"]
*/

function social_share ( $atts, $content = null ) { 
	extract(shortcode_atts(array(
        "fb" => '',
        "in" => '',
        "tw" => '',
		"pin" => '',
    ), $atts));  ?>	
	<div class="social-share">	
		<?php if ($tw == 'true') : ?>
			<a href="https://twitter.com/home?status=<?php the_permalink(); ?>" target="_blank"> <i aria-hidden="true" class="fab fa-twitter"></i> </a>
		<?php endif ?>
		
		<?php if ($fb == 'true') : ?>
			<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank"> <i aria-hidden="true" class="fab fa-facebook-f"></i> </a>
		<?php endif ?>
		
		<?php if ($pin == 'true') : ?>
			<a href="//pinterest.com/pin/create/link/?url=<?php the_permalink();?>&amp;description=<?php the_title();?>" target="_blank"> <i aria-hidden="true" class="fab fa-pinterest"></i> </a>
		<?php endif ?>
		
		<?php if ($in == 'true') : ?>
			<a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>&source=<?php wp_title(); ?>" target="_blank"> <i aria-hidden="true" class="fab fa-linkedin-in"></i> </a>
		<?php endif ?>

	</div>     
<?php } 
add_shortcode( 'social-share', 'social_share' );