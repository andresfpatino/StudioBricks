jQuery(document).ready(function() {
    active_product_line_item_menu();
	
	if( jQuery('body').attr('class').indexOf('product__line') >= 0 ) {
    	let class_list = jQuery('body').attr('class').split(' ');
    	active_product_line = class_list.filter((class_item) => class_item.indexOf('product__line') >= 0 );
    	let term_id = ( active_product_line.length > 0 ) ? active_product_line[0].split('-')[1] : null;
    	
    	if( !!term_id ) {
        	jQuery(`.products__megamenu-item`).mouseenter(function() {
        	    if( jQuery(`.custom__megamenu[data-term__id="${term_id}"]`).length > 0 ) {
        	        jQuery("header.site__header" ).addClass('site__header-active');
                    jQuery(`.custom__megamenu[data-term__id="${term_id}"]`).slideDown(200);
                    jQuery('.megamenu_prod-lines, .megamenu_search, .megamenu_about-us').slideUp(200);
        	    }
            });
            
            jQuery('.product__lines-item, .contact__megamenu-item, .faq__megamenu-item, .blog__megamenu-item, .about-us__megamenu-item').mouseenter(function() {
                jQuery(`.custom__megamenu[data-term__id="${term_id}"]`).slideUp(200);
            });
    	}
    }
    
    jQuery('.product__lines-item').mouseenter(function() {
        jQuery( "header.site__header" ).addClass('site__header-active');
        jQuery(".megamenu_prod-lines").slideDown(200);
        jQuery('.megamenu_products, .custom__megamenu, .megamenu_about-us, .megamenu_search').slideUp(200);
    });
    
    jQuery(".open-searchbar").mouseenter(function() {
        jQuery( "header.site__header" ).addClass('site__header-active');
		jQuery(".megamenu_search").slideDown(200);
        jQuery('.megamenu_prod-lines, .megamenu_products, .custom__megamenu, .megamenu_about-us').slideUp(200);
	});
	/*
	jQuery(".about-us__megamenu-item").mouseenter(function() {
	    jQuery( "header.site__header" ).addClass('site__header-active');
		jQuery(".megamenu_about-us").slideDown(200);
        jQuery('.megamenu_prod-lines, .megamenu_products, .custom__megamenu, .megamenu_search').slideUp(200);
	});
	*/
    
    // Mega menu -- CLOSED
	jQuery('.megamenu_prod-lines, .megamenu_products, .custom__megamenu, .megamenu_about-us, .megamenu_search').mouseleave(function() {
		jQuery( "header.site__header" ).removeClass('site__header-active');
	  	jQuery( this ).slideUp( 200 );
	});	
	
    jQuery(window).scroll(function() {
  		jQuery( "header.site__header" ).removeClass('site__header-active');
		jQuery('.megamenu_prod-lines, .megamenu_products, .custom__megamenu, .megamenu_about-us, .megamenu_search').slideUp(200)
	});
	
	let focus_spaces = ['1-4-seater', '1-3p-stand-up', '1-6p-stand-up', '1-6p-meet-up', '1-8p-meet-up', '1-10p-meetUp', '1-10Plus-meetUp'];

    for( let i = 0; i < focus_spaces.length; i++ ) {
    
    	jQuery(`.${focus_spaces[i]}`).hover(function() {
    
    		jQuery(`.dimension-${focus_spaces[i]}`).show();
    		if( jQuery(this).hasClass('mini__home') ) {
    		    
    		    if( jQuery(`.dimension-${focus_spaces[i]}`).length < 1 ) return false;
    		    
    		    let html = jQuery(`.dimension-${focus_spaces[i]}`).find('.elementor-text-editor').html();
    		    modificar_dimensiones_focus_spaces('update', html);
    		    
    		}
    
    	}, function() {
    
    		jQuery(`.dimension-${focus_spaces[i]}`).hide();
    		modificar_dimensiones_focus_spaces('remove');
    
    	}); 
    }
    
    // Muestra dimensiones de productos mega menu Music recording
	jQuery('.one').hover(function() {
		jQuery('.one-dimensions').show();
	}, function() {
		jQuery('.one-dimensions').hide();
	}); 
	
	jQuery('.onePlus').hover(function() {
		jQuery('.onePlus-dimensions').show();
	}, function() {
		jQuery('.onePlus-dimensions').hide();
	}); 
	
	jQuery('.oneXXL').hover(function() {
		jQuery('.oneXXL-dimensions').show();
	}, function() {
		jQuery('.oneXXL-dimensions').hide();
	});  

	jQuery('.customSolution').hover(function() {
		jQuery('.customSolution-dimensions').show();
	}, function() {
		jQuery('.customSolution-dimensions').hide();
	}); 
	
	
	
	// Muestra dimensiones de productos mega menu office solution
	jQuery('.hola').hover(function() {
		jQuery('.hola-dimensions').show();
	}, function() {
		jQuery('.hola-dimensions').hide();
	}); 

	jQuery('.hallo').hover(function() {
		jQuery('.hallo-dimensions').show();
	}, function() {
		jQuery('.hallo-dimensions').hide();
	}); 
	
	jQuery('.focus').hover(function() {
		jQuery('.focus-dimensions').show();
	}, function() {
		jQuery('.focus-dimensions').hide();
	}); 
	
	jQuery('.focusPlus').hover(function() {
		jQuery('.focusPlus-dimensions').show();
	}, function() {
		jQuery('.focusPlus-dimensions').hide();
	});
	
	jQuery('.open__mobile-nav').on('click', function() {
	    setTimeout(function() {
	        // megamenu_mobile_submenus();
	    }, 500);
	});
});

const megamenu_mobile_submenus = function() {
    jQuery('.submenu__action-mr .elementor-heading-title').on('click', function() {
        jQuery(this).toggleClass('colored-mb');
        jQuery('.submenu__mb.mb__mr').slideToggle();
    });
    jQuery('.submenu__action-os .elementor-heading-title').on('click', function() {
        jQuery(this).toggleClass('colored-mb');
        jQuery('.submenu__mb.mb__os').slideToggle();
    });
}

const modificar_dimensiones_focus_spaces = function( action, html = '' ) {
    if( action == 'update' ) {
        jQuery('.focus__dimensions .elementor-heading-title').html(html).show();
    } else {
        jQuery('.focus__dimensions .elementor-heading-title').html('').hide();
    }
}

const get_active_product_line_id = function() {
    let active_term = 0;
    
    let active_product_line = [];
    if( jQuery('body').attr('class').indexOf('product__line') >= 0 ) {
    	let class_list = jQuery('body').attr('class').split(' ');
    	active_product_line = class_list.filter((class_item) => class_item.indexOf('product__line') >= 0 );
    }
    
    if( active_product_line.length > 0 ) {
    	active_term = active_product_line[0].split('-')[1];
    } else {
        active_term = ( !!localStorage.getItem('product_line_item') ) ? localStorage.getItem('product_line_item') : 0;
    }
    
    return active_term;
}

const active_product_line_item_menu = function() {
    let active_product_line = get_active_product_line_id();
    if( active_product_line != '0' ) {
        set_product_line_item_menu_info( active_product_line );
        if( !jQuery('body').hasClass( 'product__line-' + active_product_line ) ) {
            jQuery('body').addClass( 'product__line-' + active_product_line );
        }
    }
}

const set_product_line_item_menu_info = function( term_id ) {
    let line_menu_item = jQuery(`.menu-prod-lines .elementor-icon-list-item a[data-term_id="${term_id}"]`);
    
	if( line_menu_item.length > 0 ) {
		let item_text = line_menu_item.find('.elementor-icon-list-text').text();
		let item_link = line_menu_item.attr('href');

		jQuery('.product__lines-item').addClass('item-colored');
		jQuery('.product__lines-item a').attr('href', item_link).text(item_text);
		
		localStorage.setItem( 'product_line_item', term_id );

		if( !line_menu_item.hasClass('product__line-colored') ) {
			line_menu_item.addClass('product__line-colored');
		}
	}
	
	if( jQuery(window).width() > 1024  ) {
	    let distance_header_container = jQuery('.site__header > .elementor-container').offset().left;
	    let product_lines_item_width = jQuery('.product__lines-item').offset().left - distance_header_container - 10;
	    // let about_us_item_width = jQuery('.about-us__megamenu-item').offset().left - distance_header_container - 10;
	    
	    jQuery('.menu-prod-lines').css({'marginLeft': product_lines_item_width + 'px'});
	    // jQuery('.about_us__megamenu, .about-us__menu-items, .minihome-au__menu-items').css({'marginLeft': about_us_item_width + 'px'});
	}
}