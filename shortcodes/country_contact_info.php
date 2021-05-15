<?php 
/*
--- Ejemplo: [showroom line="music-recording"]
*/

function showrooms_country($atts) { 
   ob_start();	
	$args = array(
		'post_type'      => 'showrooms',
		'publish_status' => 'published',
		'posts_per_page' => -1,
		'orderby' => 'title',
    	'order'   => 'ASC',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_line_showroom',
				'field' => 'slug',
				'terms' => $_POST['line']
			),
			array(
				'taxonomy' => 'country',
			   	'field' => 'slug',
			   	'terms' => $_POST['country']
			)	
		)		
	);
	
	$term = get_term_by('slug', $_POST['line'], 'product_line_showroom');
	
	$showRoom = new WP_Query($args); ?>	
		<h2 class="showrooms_title"> <?php echo $term->name; ?> </h2>
		
		<?php if( !empty($term->description) ) : ?>
    		<div class="showrooms_description"><?php echo $term->description; ?></div>
		<?php endif; ?>
		
		<div class="country">
			<div class="country_wrap">
				<?php while($showRoom->have_posts()) : $showRoom->the_post() ; ?>
				<div class="city">
					<h3 class="city_title"> <?php the_title(); ?> </h3>
					<div class="city_info"> <?php the_content(); ?> </div>
				</div>
				<?php endwhile; wp_reset_postdata(); ?>
			</div>
		</div>
	<?php
	wp_send_json([ "html" => ob_get_clean() ]);
}
add_action('wp_ajax_nopriv_showrooms_country', 'showrooms_country');
add_action('wp_ajax_showrooms_country', 'showrooms_country');