var last_known_scroll_position = 0;
	var ticking = false;
	let scrollOld = 0;
	let lim1 = 600;
	let proBool1 = true;
	let lim2 = 1200;
	let lim3 = 1800;
	let proBool2 = false;
	let proBool3 = false;
	let toppe=0;
	boolLoad1 = false;
	boolLoad2 = false;
	boolLoad3 = false;

	function stopScrolling (e) {
		e.preventDefault();
		e.stopPropagation();
		return false;
	}

	jQuery(function() {

		jQuery("body").css("height", 3000 );
		jQuery(window).scrollTop(0);
		jQuery('body').off('scroll mousewheel touchmove', stopScrolling);

		// these are the frame numbers that will show a detail bubble
		var details = [0, 8, 20];
		// the current index in the details array
		var detailIndex = 0;


		var framesSIBEL = SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/music/Music_circle_{frame}.jpg', 
					{ 
						frame: [1,85], digits: 3
					});
		var spin1 = jQuery('#mySpriteSpin1');
		spin1.spritespin({
			source: framesSIBEL,
			width: 640,		// width in pixels of the window/frame
			height  : 640,	// height in pixels of the window/frame
			animate : false,
			sense: -1,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){

				boolLoad1 = true;
				if( boolLoad1 == true && boolLoad2 == true && boolLoad3 == true ){
					jQuery('body').css('overflow','scroll','important');
				}
				frames = jQuery('#mySpriteSpin1').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
		});
		
		var framesHALO = SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/office/Office_circle_{frame}.jpg', 
					{ 
						frame: [1,85], digits: 3
					});
		var spin2 = jQuery('#mySpriteSpin2');
		spin2.spritespin({
			source: framesHALO,
			width: 		640,
			height  : 	640,
			animate : false,
			sense: -1,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){

				boolLoad2 = true;
				if( boolLoad1 == true && boolLoad2 == true && boolLoad3 == true ){
					jQuery('body').css('overflow','scroll','important');
				}
				frames = jQuery('#mySpriteSpin2').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
		});
		
		var framesONE = SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/audiology/Audiology_circle_{frame}.jpg', 
					{
						frame: [1,85], digits: 3
					});
		var spin3 = jQuery('#mySpriteSpin3');
		spin3.spritespin({
			source: framesONE,
			width: 		640,
			height  : 	640,
			animate : false,
			sense: -1,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){

				boolLoad3 = true;
				if( boolLoad1 == true && boolLoad2 == true && boolLoad3 == true ){
					jQuery('body').css('overflow','scroll','important');
				}
				frames = jQuery('#mySpriteSpin3').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
		});


	
		/**  */
		//responsive


		bootSpriteSpin("#sprite1mobile", {
			// generate an array of image urls.	// this is a helper function that takes a {frame} placeholder
			source: SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/music/Music_circle_{frame}.jpg', {
			// this ramge of numbers is interpolated into the {frame} placeholder
			frame: [1,85],
			// the frame placeholder will be padded with leading '0' up to the number of 'digits'
			digits: 3
			}),
			width: 320,
			height: 320,
			// reverse interaction direction
			sense: -1,
			animate : false,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){
				frames = jQuery('#sprite1mobile').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
  		});


		bootSpriteSpin("#sprite2mobile", {
			// generate an array of image urls.// this is a helper function that takes a {frame} placeholder
			source: SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/office/Office_circle_{frame}.jpg', {
			// this ramge of numbers is interpolated into the {frame} placeholder
			frame: [1,85],
			// the frame placeholder will be padded with leading '0' up to the number of 'digits'
			digits: 3
			}),
			width: 320,
			height: 320,
			// reverse interaction direction
			sense: -1,
			animate : false,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){
				frames = jQuery('#sprite2mobile').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
  		});



		bootSpriteSpin("#sprite3mobile", {
			// generate an array of image urls.
			source: SpriteSpin.sourceArray('/wp-content/themes/studiobricks/images/audiology/Audiology_circle_{frame}.jpg', {
			// this ramge of numbers is interpolated into the {frame} placeholder
			frame: [1,85],
			// the frame placeholder will be padded with leading '0' up to the number of 'digits'
			digits: 3
			}),
			width: 320,
			height: 320,
			// reverse interaction direction
			sense: -1,
			animate : false,
			frameTime: 66,
			animate: false,
			plugins: [
		      '360',
		      'wheel',
		      'drag'
		    ],
			onLoad : function(e){
				frames = jQuery('#sprite3mobile').data("spritespin").frames;
				jQuery(window).scrollTop(1);
    		}
  		});
	});

	function bootSpriteSpin(selector, options) {
		if ("IntersectionObserver" in window) {
			// Browser supports IntersectionObserver so use that to defer the boot
			let observer = new IntersectionObserver(function(entries, observer) {
			entries.forEach(function(entry) {
				if (entry.isIntersecting) {
				observer.unobserve(entry.target);
				jQuery(entry.target).spritespin(options);
				//console.log("booted", selector, options);
				}
			});
			});
			observer.observe(jQuery(selector)[0]);
		} else {
			// Browser does not support IntersectionObserver so boot instantly
			jQuery(selector).spritespin(options);
			//console.log("booted", selector, options);
		}
		}
	jQuery('a[href*=\\#]').on('click', function(event){    
	
		event.preventDefault();

		if(jQuery(this).attr('href')=="#Musicsection"){
			toppe=1;
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin1').data("spritespin") ,toppe);
			jQuery("#mySpriteSpin1").css("display","block");
			jQuery("#mySpriteSpin2").css("display","none");
			jQuery("#mySpriteSpin3").css("display","none");
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor1").css("color","#ff685d");
			jQuery("div#languages > h2").html("Freedom to be loud");
			jQuery(".content-title1").css("display","block");
			jQuery(".content-title2").css("display","none");
			jQuery(".content-title3").css("display","none");
			
		}else if(jQuery(this).attr('href')=="#Officesection"){

			toppe=410;
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin2').data("spritespin") , toppe);
			jQuery("#mySpriteSpin1").css("display","none");
			jQuery("#mySpriteSpin2").css("display","block");
			jQuery("#mySpriteSpin3").css("display","none");
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor2").css("color","#ff685d");
			jQuery("div#languages > h2").html("Freedom to be productive");
			jQuery(".content-title1").css("display","none");
			jQuery(".content-title2").css("display","block");
			jQuery(".content-title3").css("display","none");
			
		}else if(jQuery(this).attr('href')=="#Audiosection"){
			toppe=810;
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin3').data("spritespin") ,toppe);
			jQuery("#mySpriteSpin1").css("display","none");
			jQuery("#mySpriteSpin2").css("display","none");
			jQuery("#mySpriteSpin3").css("display","block");
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor3").css("color","#ff685d");
			jQuery("div#languages > h2").html("Freedom to be silent");
			jQuery(".content-title1").css("display","none");
			jQuery(".content-title2").css("display","none");
			jQuery(".content-title3").css("display","block");
		}

		jQuery(window).scrollTop(toppe);
		return false;
	});

	jQuery(document).on("scroll",function(e){

		let posString = jQuery(window).scrollTop().toString();

		let posStringSplice = posString.substring( 0 , posString.length - 1 );
		let pos = 0;
		if( posStringSplice.length == 0 ){
			pos = 0;
		}
		else {
			pos = parseInt( posString.substring( 0 , posString.length - 1 ) );
		}

		if( pos * 10 <= lim1 ){
			jQuery("#mySpriteSpin1").css("display","block");
			jQuery("#mySpriteSpin2").css("display","none");
			jQuery("#mySpriteSpin3").css("display","none");
			//console.log(lim1,pos * 10);
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin1').data("spritespin") , pos );
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor1").css("color","#ff685d");
			jQuery(".ct").css("display","none");
			jQuery(".content-title1").css("display","block");
			
			jQuery("#languages > h2").text("Freedom to be loud");
			proBool1 = true;
			proBool2 = false;
			proBool3 = false;
			
		}
		
		if( pos * 10 > lim1 && pos * 10 <= lim2 ){
			jQuery("#mySpriteSpin1").css("display","none");
			jQuery("#mySpriteSpin2").css("display","block");
			jQuery("#mySpriteSpin3").css("display","none");
			//console.log("lim2:",lim2,pos * 10,pos - 40);
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin2').data("spritespin") , pos - 60 );
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor2").css("color","#ff685d");
			jQuery(".ct").css("display","none");
			jQuery(".content-title2").css("display","block");
			
			jQuery("#languages > h2").text("Freedom to be productive");
			proBool1 = false;
			proBool2 = true;
			proBool3 = false;
			
		}
		
		if( pos * 10 > lim2 && pos * 10 <= lim3 ){
			jQuery("#mySpriteSpin1").css("display","none");
			jQuery("#mySpriteSpin2").css("display","none");
			jQuery("#mySpriteSpin3").css("display","block");
			//console.log("lim3:",lim3,pos);
			//console.log(lim3,pos);
			SpriteSpin.updateFrame( jQuery('#mySpriteSpin3').data("spritespin") , pos - 120 );
			jQuery(".anchorLink").css("color","#2E2B2B");
			jQuery("#anchor3").css("color","#ff685d");
			jQuery(".ct").css("display","none");
			jQuery(".content-title3").css("display","block");
			
			jQuery("#languages > h2").text("Freedom to be silent");
			proBool1 = false;
			proBool2 = true;
			proBool3 = false;
			
		}
	});