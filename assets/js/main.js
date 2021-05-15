function normalize_text_search( str ) {
	return str.normalize("NFD").replace(/[\u0300-\u036f]/g, "").toLowerCase();
}
jQuery(document).ready(function ($) {
	
	products_form_customization_checboxes();
	
	$('.eael-tabs-nav ul li').on('click', function() {
		setTimeout(function() {
			products_form_customization_checboxes();
		}, 400);
	})

	// FAQ
	$('#searchFac').on('keyup change', function() {
		// Si no tiene al menos tres caracteres no realiza ninguna busqueda
		
		$('.resultsFac ul').html('');
		
		if( $(this).val().length < 3 ) {
			$('.faq').removeClass('faq__hide');
			return false;
		}
		
		$('.resultsFac').show();
		let value = $(this).val();
		let normalize_value = normalize_text_search(value);

		$('.faq').each(function() {
			let title = $(this).find('.faq_title').text();
			let ancla = $(this).attr('id');
			let normalize_title = normalize_text_search(title);
			
			if( normalize_title.indexOf(normalize_value) >= 0 ) {
			    $('.resultsFac ul').append(`<li><a href="#${ancla}">${title}</a></li>`)
			}

			if( normalize_title.indexOf(normalize_value) < 0 ) {
				$(this).addClass('faq__hide');
			} else if( normalize_title.indexOf(normalize_value) >= 0 && $(this).hasClass('faq__hide') ) {
				$(this).removeClass('faq__hide');
			}
		})
		
		show_faq_response();
	});
	
	$('.faq .faq_content').click(function(e){		
		let parent = $(this).parent();		
		if( parent.hasClass('faq__hide') ) return false;
		let post_id = parent.data('post_id');
		let parent_cat = parent.data('categories') + '';
		
		if( parent_cat.indexOf(',') >= 0 ) {
		    parent_cat = parent_cat.replace(' ', '').split(',');
		} else {
		    parent_cat = parent_cat.split(' ');
		}
		
		$('.faq').each(function() {
		    
			let id = $(this).data('post_id');
			let reveal = $(this).find('.faq_content--reveal');			
			if( id != post_id & reveal.is(':visible') ) {
				reveal.hide();
			}
			
			//if( $('.faqs_category_select li a.active').length < 1 || $('.faqs_category_select li a.active').attr('data-id') == 'all' ) {
			    
			    let categories = $(this).data('categories') + '';
    		    if( categories.indexOf(',') >= 0 ) {
        		    categories = categories.replace(' ', '').split(',');
        		} else {
        		    categories = categories.split(' ');
        		}
    		    
    		    let categories_coincidence = categories.filter(element => parent_cat.includes(element));
			    if( categories_coincidence.length < 1 ) {
    		        $(this).addClass('faq__hide');
    		    } else {
    		        $(this).removeClass('faq__hide');
    		    }
			//}
		})
		parent.find('.faq_content--reveal').show();
		
		$('.faqs_category_select li a').each(function() {
            // console.log($(parent).data('categories'))
            let categorias = $(parent).data('categories') + '';
            if( !!categorias ) {
                // console.log(categorias)
                if( categorias.indexOf( $(this).attr('data-id') ) >= 0 ) {
                    $(this).addClass('active');
                } else {
                    $(this).removeClass('active');
                }
            } else {
                $(this).removeClass('active');
            }
        });
	});
	$('.close-reveal').click(function(){
		$(this).parent().hide();
	});	
	
	$('#audio-switch').on('click', function() {
		if( $(this).is(':checked') ) {
			// Outside activo			
			$('#outside-switch').addClass('active');
			$('#inside-switch').removeClass('active');
		} else {
			// Inside activo
			$('#inside-switch').addClass('active');
			$('#outside-switch').removeClass('active');
		}
	});
	
	$('.faqs_category_select a[data-id]').on('click', function() {
	    let id = $(this).data('id');
	    
	    $('.faqs_category_select a[data-id]').each(function() {
	        if( $(this).data('id') != id ) {
	            $(this).removeClass('active');
	        }
	    });
	    
	    $(this).addClass('active');
	    
	    if( id == 'all' ) {
	        $('.faq').removeClass('faq__hide');
	        return false;
	    }
	    
	    $('.faq').each(function() {
			let categories = $(this).data('categories') + '';
			categories = categories.split(',');
			
			let filtered = categories.filter( el => el == id );
			
			if( filtered.length < 1 ) {
				$(this).addClass('faq__hide');
			} else if( filtered.length > 0 && $(this).hasClass('faq__hide') ) {
				$(this).removeClass('faq__hide');
			}
		})
	})
	
	// Seleccion de los items de contacto
	$('.select-country').on('change', function(){          
        let line = $(this).data('line');
        let country = $(this).val()
        
        $('.select-country').each(function() {
            if( $(this).data('line') != line ) {
                $(this).val('')
            }
        })
        
        //La llamada AJAX
        $.ajax({
            type: "post",
            url: php.ajax_url, // Pon aquí tu URL
            data: {
            action: "showrooms_country", 
                line: line,
                country: country
            }
        }).done(function(resp) {
            $('.contact_response_html').html(resp.html)
        })
    
    });
    
    $('.select__options').on('click', function() {
        $('.product__tabs .eael-tabs-nav li:last-child').click();
        $('html, body').animate({
 			scrollTop: $('#product__tabs').offset().top - $('.site__header').height()
 		}, 500);
    });
	
	$('.single-product a[href*="#"]:not([href="#"])').click(function() {
    	if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
    		var target = $(this.hash);
    		target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
    		if (target.length) {
    			$('html, body').animate({
    				scrollTop: target.offset().top - $('.site__header').height()
    			}, 1000);
    			return false;
    		}
    	}
    });
	
	/*
	if( $('.carousel__products').length > 0 && $(window).width() < 768 ) {
		$('.carousel__products > div > .elementor-row').slick({
			arrows: true,
			infinite: false,
			autoplay: false,
			speed: 300,
			slidesToShow: 1,
			slidesToScroll: 1
		});
	}
	*/
	
	$('.selection_btn').on('click', function() {
		OfficeBoxesFunc($(this));
	});
	$('.selection_btn').hover(function() {
		OfficeBoxesFunc($(this));
	});
	
	const OfficeBoxesFunc = (elem) => {
		let clases = elem.attr('class');
		console.log(clases)

		$('.carousel__products .products__box section.elementor-section').each(function() {
			if( $(this).is(':visible') ) {
				$(this).hide();
			}
		})

		if( elem.hasClass('selection__hola') ) {
			$('.product__box-hola').show();
		} else if( elem.hasClass('selection__hallo') ) {
			$('.product__box-hello').show();
		} else if( elem.hasClass('selection__focus') ) {
			$('.product__box-focus').show();
		} else if( elem.hasClass('selection__focus-plus') ) {
			$('.product__box-focus-plus').show();
		} else if( elem.hasClass('selection__focus-spaces') ) {
			$('.product__box-focus-spaces').show();
		} else {
			$('.product__box-hola').show();
		}
	}
    
    $('.reviews__carousel .elementor-widget-wrap').slick({
	    arrows: true,
    	infinite: false,
    	speed: 300,
    	slidesToShow: 3,
    	slidesToScroll: 1,
    	responsive: [{
    		breakpoint: 768,
    		settings: {
    			slidesToShow: 2
    		}
    	}]
    });
	
	// gallery image product
	$( ".woocommerce-product-gallery ol" ).removeClass( "flex-control-nav flex-control-thumbs" );
	$( ".woocommerce-product-gallery ol" ).addClass( "thumbs-prod-gallery"); 
    $('.thumbs-prod-gallery').slick({
	    arrows: false,
		infinite: false,
		dots: false,
    	speed: 300,
    	slidesToShow: 15,
    	slidesToScroll: 1
    });
	
	// Testimonials
    $('.testimonials_wrap').slick({
	    arrows: false,
		infinite: true,
		dots: false,
    	speed: 300,
    	slidesToShow: 1,
    	slidesToScroll: 1,
		draggable: true,
		autoplay: true,
		autoplaySpeed: 5000,
    });
	
	if( $('.products__select').length > 0 || $('#form-field-products__select').length > 0 ) {
	    //La llamada AJAX
        $.ajax({
            type: "post",
            url: php.ajax_url, // Pon aquí tu URL
            data: { action: "get_products_list" }
        }).done(function(resp) {
            console.log(resp.products)
            for( let i = 0; i < resp.products.length; i++ ) {
                let product = resp.products[i];
                let selected = ( $('body').hasClass(`postid-${product.ID}`) ) ? 'selected="selected"' : '';
                let option = `<option data-post_id="postid-${product.ID}" ${selected} data-product_line="${product.product_line}" value="${product.post_title}">${product.post_title}</option>`;
                
                if( $('.products__select').length > 0 ) {
                    $('.products__select').append(option);
                } else if( $('#form-field-products__select').length > 0 ) {
                    $('#form-field-products__select').append(option);
                }
            }
        })

        $('input[name="form_fields[interest]"]').on('change', function() {
            let line = $('input[name="form_fields[interest]"]:checked').val();
            $('#form-field-products__select option').each(function() {
                let product_line = $(this).attr('data-product_line');
                if( !!product_line && product_line !== line ) {
                    $(this).hide();
                } else {
                    $(this).show();
                }
            });
        });

	}
	
	
	// Contact page form
	$(".form-contact-page #form-field-product option:first-child").attr("disabled","disabled");
	$(".form-contact-page #form-field-howdidhear option:first-child").attr("disabled","disabled");
	$(".form-contact-products #form-field-product option:first-child").attr("disabled","disabled");
	
	
	// Showrooms
	$('.select-country').change(function(){
		$('.country').hide();
		$('#' + $(this).val()).show();
	});
	
	setTimeout(function() {
		audio_comparison_func($);
	}, 500);
	
	add_active_caption_to_thumbnails($);
	
	$('.thumbs-prod-gallery .slick-slide').on('click', function() {
        $('.thumbs-prod-gallery .slick-slide').removeClass('active__thumb');
        $(this).addClass('active__thumb');
        
        add_active_caption_to_thumbnails($);
    });
    
    if( jQuery('.product__slogan').length > 0 ) {
        setTimeout(function() {
            product_icons_margin_and_height();
        }, 500);
    }

});

const product_icons_margin_and_height = function() {
    // Set icons margin top
    let product_slogan_distance = jQuery('.product__slogan').offset().top;
    let product_description_distance = jQuery('.elementor-column.product__description').offset().top;
    let margin_top_icons = product_slogan_distance - product_description_distance;
    
    let product_gallery_height = jQuery('.product__gallery > .elementor-column-wrap').height();
    let product_description_height = jQuery('.product__description > .elementor-column-wrap').height();
    let max_height = ( product_gallery_height > product_description_height ) ? product_gallery_height : product_description_height;
    max_height = max_height - margin_top_icons;

    jQuery('.icons__column .elementor-widget-wrap').css({ 'marginTop': margin_top_icons + 'px', 'maxHeight': max_height + 'px' });
}

const add_active_caption_to_thumbnails = ($) => {
    // Add active photo caption
    setTimeout(function() {
        let active_caption = $('.woocommerce-product-gallery__image.flex-active-slide a img').attr('data-custom_caption');
        console.log(active_caption)
        $('.product__img-captions').html(active_caption);
    }, 500);
}

const audio_comparison_func = ($) => {
	$('#audio-switch').on('change', function() {
		if( $('#audio-switch').is(':checked') ) {
			$('#audio__02').show();
			$('#audio__01').hide();
		} else {
			$('#audio__01').show();
			$('#audio__02').hide();
		}
	});
}

const show_faq_response = function() {
    jQuery('.resultsFac a').on('click', function(e) {
        let href = jQuery(this).attr('href');
        let faq_item = href.replace('#', '');
        
        jQuery(`#${faq_item} .faq_content`).click();
        jQuery('.resultsFac').hide();
    })
}

const products_form_customization_checboxes = () => {
	
	if( jQuery('input[name="customization"]').length < 1 ) return false;
	
	jQuery('input[name="customization"]').on('change', function() {
		let values = [];

		jQuery('input[name="customization"]:checked').each(function() {
			let parent = jQuery(this).parent().parent().parent().parent().parent();
			let columns = parent.find('td');
			let columns_length = columns.length - 1;
			let selected_column = columns[ columns_length - 1 ];
			let text = jQuery(selected_column).find('.td-content').text();

			//console.log(jQuery(selected_column).find('.td-content'))
			//console.log(jQuery(selected_column).find('.td-content').text())

			values.push(text);
		});

		jQuery('#customization__input').val( values.join(", ") );
	});
}
