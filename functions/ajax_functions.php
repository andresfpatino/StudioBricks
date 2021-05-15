<?php

add_action('wp_ajax_nopriv_get_products_list', 'get_products_list_callback');
add_action('wp_ajax_get_products_list', 'get_products_list_callback');
function get_products_list_callback() {
    $args = array(
        'post_type' => 'product',
        'posts_per_page' => 1000,
	'orderby' => 'post_title',
	'order' => 'ASC'
    );
    $loop = new WP_Query( $args );
    $posts = [];

    foreach( $loop->posts as $post ) {
        $terms = get_the_terms( $post, 'product-line' );
	$product_line = ( !isset($terms->error_data) ) ? $terms[0]->slug : '';
        $posts[] = [ "ID" => $post->ID, "post_title" => $post->post_title, "product_line" => $product_line ];
    }
    	
    wp_send_json([ "products" => $posts ]);
}