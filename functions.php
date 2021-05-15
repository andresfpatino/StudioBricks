<?php

// DISABLE GUTEMBERG
add_filter('use_block_editor_for_post', '__return_false', 10);

// Activar mimes para subir archivos
add_filter( 'upload_mimes', 'custom_upload_mimes' );
function custom_upload_mimes( $existing_mimes = array() ) {
	$existing_mimes['svg'] = 'image/svg+xml';
	$existing_mimes['woff'] = 'font/woff';
	$existing_mimes['woff2'] = 'font/woff2';
	$existing_mimes['eot'] = 'font/eot';
	$existing_mimes['ttf'] = 'font/ttf';	
	return $existing_mimes;
}

// STYLES - SCRIPTS 
require_once(dirname(__FILE__).'/functions/wp_enqueue_scripts.php');

// Blog
require_once(dirname(__FILE__).'/shortcodes/shortcode_blog.php');

// Testimonials
require_once(dirname(__FILE__).'/shortcodes/testimonials.php');

// Social share
require_once(dirname(__FILE__).'/shortcodes/social_share.php');

// FAQ
require_once(dirname(__FILE__).'/shortcodes/faq.php');

// Country Contact page
require_once(dirname(__FILE__).'/shortcodes/country_contact_info.php');

// Ajax functions
require_once(dirname(__FILE__).'/functions/ajax_functions.php');

// Woocommerce functions
require_once(dirname(__FILE__).'/functions/woocommerce.php');

// Custom taxonomies functions
require_once(dirname(__FILE__).'/functions/taxonomies.php');
