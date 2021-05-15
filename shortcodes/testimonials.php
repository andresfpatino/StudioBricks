<?php  // [testimonials line="office-solutions"]

function shortcode_testimonials($atts){ 
	ob_start(); 	
	$args = array(
		'post_type'      => 'testimonials',
		'publish_status' => 'published',
		'posts_per_page' => -1,
		'orderby' => 'title',
    	'order'   => 'ASC'			
	);
	
	if( isset( $atts['line'] ) && !empty( $atts['line'] ) ) {
	    $args['tax_query'] = array(
			array(
				'taxonomy' => 'cat_testimonial',
				'field' => 'slug',
				'terms' => $atts['line']
			)
		);
	}
	
	$testimonials = new WP_Query($args);
	
    if($testimonials->have_posts()) : ?>

		<div class="testimonials_wrap">
			<?php while($testimonials->have_posts()) : $testimonials->the_post() ; ?>
			    <div class="testimonial">
					<p class="testimonial_main_sentence"> <?php the_field('main_sentence'); echo ' ...'; ?> </p>
					<p class="testimonial_extract"> <?php echo get_the_content(); ?> </p>
					<p class="testimonial_name"> — <?php echo the_title(); ?> </p>
					<p class="testimonial_position"> <?php the_field('position'); ?> </p>
				</div>
			<?php endwhile; ?>			
		</div> 	

		<?php wp_reset_postdata(); 	
    endif;  
	
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string; 
} 
add_shortcode( 'testimonials', 'shortcode_testimonials' ); 