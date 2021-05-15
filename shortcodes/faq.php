<?php  // [FAQ line="office-solutions"]

function shortcode_faqs($atts){ 
	ob_start(); 	
	$args = array(
		'post_type'      => 'cpt_faq',
		'publish_status' => 'published',
		'posts_per_page' => -1,
		'orderby' => 'title',
    	'order'   => 'ASC'			
	);
	
	if( isset( $atts['line'] ) && !empty( $atts['line'] ) ) {
	    $args['tax_query'] = array(
			array(
				'taxonomy' => 'product_line',
				'field' => 'slug',
				'terms' => $atts['line']
			)
		);
	}
	
	$queryFaq = new WP_Query($args);
	
    if($queryFaq->have_posts()) : ?>
		<div class="faqs_wrap">
			<?php while($queryFaq->have_posts()) : $queryFaq->the_post() ; ?>
			    
			    <?php $categories = get_the_terms( get_the_id(), 'product_line' ); ?>
			
				<div class="faq" data-post_id="<?php echo get_the_id(); ?>" data-categories="<?php echo join(', ', wp_list_pluck($categories, 'term_id')); ?>" id="faq-item-<?php echo get_the_id(); ?>">	
					<div class="faq_content">
						<h3 class="faq_title"> <?php the_title(); ?> </h3>	
						<svg class="open-reveal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.9 8.8"><defs><style>.cls-1{fill:#d9d7cf;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><path class="cls-1" d="M9.9,5.14H5.74V8.8H4.16V5.14H0V3.66H4.16V0H5.74V3.66H9.9Z"/></g></g></svg>
					</div>
					<div class="faq_content--reveal">
						<!--<i class="fa fa-times close-reveal" aria-hidden="true"></i>-->
						
						<svg class="close-reveal" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.9 8.8"><defs><style>.cls-1{fill:#d9d7cf;}</style></defs><g id="Layer_2" data-name="Layer 2"><g id="Layer_2-2" data-name="Layer 2"><path class="cls-1" d="M9.9,5.14H5.74V8.8H4.16V5.14H0V3.66H4.16V0H5.74V3.66H9.9Z"/></g></g></svg>
						
						<h3 class="faq_title"> <?php the_title(); ?> </h3>
						<div class="faq--excerpt"> <?php the_content(); ?> </div>
					</div>	
				</div>
			<?php endwhile; ?>			
		</div> 		
		<?php wp_reset_postdata(); 	
    endif;  
	
	$output_string = ob_get_contents();
	ob_end_clean();
	return $output_string; 
} 
add_shortcode( 'FAQ', 'shortcode_faqs' ); 