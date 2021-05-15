<?php 

function studiobricks_enqueue_child_styles() {
    
    global $post;
    
	// CSS
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css');  // Tema padre	
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css'); // Tema hijo
	
	// Slick slider
	wp_enqueue_style( 'child-slick-theme', get_stylesheet_directory_uri() . '/libs/slickslider/slick-theme.css', '', '1.0.0' );
	wp_enqueue_style( 'child-slick', get_stylesheet_directory_uri() . '/libs/slickslider/slick.css', '', '1.0.0' );
	wp_enqueue_script( 'child-slick-script', get_stylesheet_directory_uri() . '/libs/slickslider/slick.min.js', array(), '1.0.0', true );
    
    // Main css
	wp_enqueue_style( 'maincss', get_stylesheet_directory_uri() . '/assets/css/main.css', array(), '1.5.66'); // Estilos principales
	
	if( is_product() ) {
	    wp_enqueue_style( 'productscss', get_stylesheet_directory_uri() . '/assets/css/products.css', array(), '1.4.21'); // Estilos de las internas de los productos
	}
	
	// JS	
	wp_enqueue_script( 'spritespin', get_stylesheet_directory_uri() . '/assets/js/spritespin.js', array('jquery'), "4.0.11", false );
	wp_enqueue_script( 'mainjs', get_stylesheet_directory_uri() . '/assets/js/main.js', array('jquery'), "1.5.8", true ); // MainJS
	wp_localize_script('mainjs', 'php', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
	wp_enqueue_script( 'megamenujs', get_stylesheet_directory_uri() . '/assets/js/megamenu.js', array('jquery'), "1.2.1", true ); // MainJS
	wp_localize_script('megamenujs', 'php', array(
        'ajax_url' => admin_url( 'admin-ajax.php' )
    ));
    
    if( has_shortcode( $post->post_content, 'elementor-template') ) {
        // Include library
        wp_enqueue_style( 'plyrcss', get_stylesheet_directory_uri() . '/libs/plyrjs/plyr.css', array(), '1.0.0');
        wp_enqueue_script( 'plyrjs', get_stylesheet_directory_uri() . '/libs/plyrjs/plyr.js', array('jquery'), "1.0.0", true );
        
        wp_enqueue_style( 'audio-comparisoncss', get_stylesheet_directory_uri() . '/assets/css/audio-comparison.css', array(), '1.0.3');
        wp_enqueue_script( 'audio-comparisonjs', get_stylesheet_directory_uri() . '/assets/js/audio-comparison.js', array('jquery'), "1.3.0", true ); // MainJS
    }
}
add_action( 'wp_enqueue_scripts', 'studiobricks_enqueue_child_styles' );