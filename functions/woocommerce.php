<?php

add_filter('wp_get_attachment_image_attributes', 'change_attachement_image_attributes', 20, 2);

function change_attachement_image_attributes( $attr, $attachment ){
    
    // Get post parent
    $field_name = '';
    switch( get_locale() ) {
    	case 'en_US':
    		$field_name = 'caption_ingles';
    	break;
    	case 'de_DE':
    		$field_name = 'caption_aleman';
    	break;
    	case 'fr_FR':
    		$field_name = 'caption_frances';
    	break;
    	default:
    		$field_name = 'caption_espanol';
    	break;
    }
    
    if( get_field( $field_name, $attachment->ID ) ) {
        $attr['data-custom_caption'] = get_field( $field_name, $attachment->ID );
    } else {
        $attr['data-custom_caption'] = ' ';
    }

    return $attr;
}

add_action( 'after_setup_theme', 'tu_disable_wc_lightbox', 20 );
function tu_disable_wc_lightbox() {
	remove_theme_support( 'wc-product-gallery-zoom' );
    remove_theme_support( 'wc-product-gallery-lightbox' );
}