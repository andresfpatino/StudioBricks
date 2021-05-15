<?php

if( !function_exists('create_product_type_taxonomy') ) {
	add_action( 'init', 'create_product_type_taxonomy', 0 );
	function create_product_type_taxonomy() {

		// Add new taxonomy, make it hierarchical like categories
		//first do the translations part for GUI

		$labels = array(
			'name' => _x( 'Linea de producto', 'taxonomy general name' ),
			'singular_name' => _x( 'Linea de producto', 'taxonomy singular name' ),
			'search_items' =>  __( 'Buscar linea de producto' ),
			'all_items' => __( 'Todas las lineas de producto' ),
			'parent_item' => __( 'Linea de producto padre' ),
			'parent_item_colon' => __( 'Linea de producto padre:' ),
			'edit_item' => __( 'Editar linea de producto' ), 
			'update_item' => __( 'Actualizar linea de producto' ),
			'add_new_item' => __( 'A&ntilde;adir linea de producto' ),
			'new_item_name' => __( 'Nuevo nombre de linea de producto' ),
			'menu_name' => __( 'Linea de producto' ),
		); 	

		// Now register the taxonomy

		register_taxonomy('product-line', array('product', 'post', 'page'), array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'show_admin_column' => true,
			'query_var' => true,
			'rewrite' => array( 'slug' => 'product-line' ),
		));

	}
}

if( !function_exists('product_line_classes') ) {
    add_filter( 'body_class','product_line_classes' );
    function product_line_classes( $classes ) {
        
        global $post;
        $product_lines = get_the_terms($post->ID, 'product-line');
        
        if( $product_lines ) {
            foreach( $product_lines as $line ) {
                $classes[] = 'product__line-' . $line->term_id;
            }
        }
         
        return $classes;
    }
}