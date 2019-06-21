
	//Main custom script file
	jQuery(document).ready(function(jQuery){
		/* ==============================================
	Sticky
	=============================================== */
    
	try {
		jQuery(".navbar-sticky, .navbar-sticky-bottom").sticky({
			topSpacing: 0,
			className: 'sticky'
		});
		
	} catch (err) {

	}
	
	jQuery('.navbar-nav li a').smoothScroll({
		speed: 1000,
		easing: 'swing',
		offset: 25
	});
		
	
		/* ==============================================
	DROPDOWN MENU 
	=============================================== */	
	jQuery(function(){	
		jQuery(".dropdown-menu").parent("li").append();
				
		jQuery(".dropdown-toggle").on("mouseenter", function() {
		   jQuery(this).find("ul").stop().slideDown();
		});
		
		jQuery(".dropdown-toggle ").on("mouseleave", function() {
		   jQuery(this).find("ul").stop().slideUp();
		});
	});	
			
		/* ==============================================
	Navbar Toggle Mobile Menu On Click Function
	=============================================== */
	
	jQuery(function(){
		jQuery('.navbar-collapse ul li a:not(.dropdown-toggle)').on('click', function(event){
			jQuery('.navbar-toggle:visible').click();
		});
	});
	
		/* ==============================================
	Navbar Scroll Function
	=============================================== */
	
	jQuery(function(){
		jQuery(window).scroll(function() {
			if (jQuery(".navbar").offset().top > 10)  {
				jQuery(".navbar-coco").addClass("coco-nav-collapse");

			} else {
				jQuery(".navbar-coco").removeClass("coco-nav-collapse");
			}
		});
	});
		
		
		//Counter up
		jQuery('.counter').counterUp({
			delay: 10,
			time: 1000
		});
		
		//owl carousal
		jQuery(function(){	
			jQuery(".client-slider").owlCarousel({
				items: 7,
				itemsDesktop : [1199,5],
				itemsDesktopSmall : [980,4],
				itemsTablet: [768,3],
				itemsTabletSmall: false,
				itemsMobile : [479,1],
				margin:10,
				navigation: false,
				pagination: false,
				singleItem:false,
				autoPlay: true,
				slideSpeed: 5
			});
		});
		
		if(jQuery('.bxslider').length){jQuery('.bxslider').bxSlider({pagerCustom:'#bx-pager'});}
		
		//apps owl carousal
		jQuery('#apps-owl').owlCarousel({
			autoPlay: true,
			navigation : true,
			pagination: false,
			items: 5
		});
		
		//apps team owl
		jQuery('#apps-team-owl').owlCarousel({
			autoPlay: true,
			navigation : true,
			pagination: false,
			items: 5
		});

		//parallax
		jQuery('.parallax_one').parallax();
		jQuery('.parallax_two').parallax();
		jQuery('.parallax_three').parallax();
		jQuery('.parallax_four').parallax();
		jQuery('.parallax_five').parallax();
		jQuery('.slider_background').parallax();
		
		// slides
		jQuery('#products').slides({
			autoPlay: true,
			preload: true,
			preloadImage: 'images/loading.gif',
			effect: 'slide, fade',
			crossfade: true,
			slideSpeed: 500,
			fadeSpeed: 500,
			generateNextPrev: true,
			generatePagination: false
		});
		
		
		
		// form validation
		jQuery('#form').parsley();
		
		
		
		//contact form
		jQuery('#contactform').submit(function(){
			var action = jQuery(this).attr('action');
			jQuery("#message").slideUp(250,function() {
				jQuery('#message').hide();
				jQuery('#submit')
					.after('<img src="images/contact-form-loader.gif" class="loader" />')
					.attr('disabled','disabled');
				jQuery.post(action, {
						name: jQuery('#name').val(),
						email: jQuery('#email').val(),
						website: jQuery('#website').val(),
						capcha: jQuery('#capcha').val(),
						comments: jQuery('#comments').val(),
					},
					function(data){
						document.getElementById('message').innerHTML = data;
						jQuery('#message').slideDown(250);
						jQuery('#contactform img.loader').fadeOut('slow',function(){jQuery(this).remove()});
						jQuery('#submit').removeAttr('disabled');
						if(data.match('success') != null) jQuery('#contactform').slideUp(850, 'easeInOutExpo');
					}
				);
			});
			return false;
		});
		
		// go to top
		jQuery(window).scroll(function() {
			if(jQuery(this).scrollTop() != 0) {
				jQuery('#toTop, #backtotop').fadeIn();	
			} else {
				jQuery('#toTop, #backtotop').fadeOut();
			}
		});
		
		jQuery('#toTop').click(function() {
			jQuery('body,html').animate({scrollTop:0},800);
		});
		
	});
	
		/* ==============================================
	ISOTOPE
	=============================================== */
		
		// init cubeportfolio
			jQuery('#isotope-container').cubeportfolio({
				filters: '#js-filters-masonry-projects',
				loadMore: '#js-loadMore-masonry-projects',
				loadMoreAction: 'click',
				layoutMode: 'grid',
				
				gridAdjustment: 'responsive',
				mediaQueries: [{
					width: 1500,
					cols: 5
				}, {
					width: 1100,
					cols: 5
				}, {
					width: 800,
					cols: 3
				}, {
					width: 480,
					cols: 2
				}, {
					width: 320,
					cols: 1
				}],
				defaultFilter: '*',
				animationType: 'rotateSides',
				gapHorizontal: 20,
				gapVertical: 20,
				gridAdjustment: 'responsive',
				caption: 'zoom',
				displayType: 'sequentially',
				displayTypeSpeed: 100,

				// lightbox
				lightboxDelegate: '.cbp-lightbox',
				lightboxGallery: true,
				lightboxTitleSrc: 'data-title',
				lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',

				// singlePage popup
				singlePageDelegate: '.cbp-singlePage',
				singlePageDeeplinking: true,
				singlePageStickyNavigation: true,
				singlePageCounter: '<div class="cbp-popup-singlePage-counter">{{current}} of {{total}}</div>',
				singlePageCallback: function(url, element) {
					// to update singlePage content use the following method: this.updateSinglePage(yourContent)
					var t = this;

					jQuery.ajax({
							url: url,
							type: 'GET',
							dataType: 'html',
							timeout: 30000
						})
						.done(function(result) {
							t.updateSinglePage(result);
						})
						.fail(function() {
							t.updateSinglePage('AJAX Error! Please refresh the page!');
						});
				},
			});	
		
		
	/* ==============================================
	REVOLUTION CUSTOM
	=============================================== */
	
	var tpj=jQuery;			
	var revapi4;
	tpj(document).ready(function() {
		if(tpj("#rev_slider_4_1").revolution == undefined){
			revslider_showDoubleJqueryError("#rev_slider_4_1");
		}else{
			revapi4 = tpj("#rev_slider_4_1").show().revolution({
				sliderType:"standard",
				jsFileLocation:"../../revolution/js/",
				sliderLayout:"fullscreen",
				dottedOverlay:"none",
				delay:9000,
				navigation: {
					keyboardNavigation:"off",
					keyboard_direction: "horizontal",
					mouseScrollNavigation:"off",
					onHoverStop:"off",
					touch:{
						touchenabled:"on",
						swipe_threshold: 75,
						swipe_min_touches: 1,
						swipe_direction: "horizontal",
						drag_block_vertical: false
					}
					
					,
					bullets: {
						enable: false,
						hide_onmobile: false,
						style: "hebe",
						hide_onleave: false,
						direction: "horizontal",
						h_align: "center",
						v_align: "bottom",
						h_offset: 20,
						v_offset: 30,
						space: 5,
						tmp: '<span class="tp-bullet-image"></span>'
					}
				},
				viewPort: {
					enable:true,
					outof:"pause",
					visible_area:"80%"
				},
				responsiveLevels:[1240,1024,778,480],
				gridwidth:[1240,1024,778,480],
				gridheight:[700,700,550,450],
				lazyType:"none",
				parallax: {
					type:"mouse",
					origo:"slidercenter",
					speed:2000,
					levels:[2,3,4,5,6,7,12,16,10,50],
				},
				shadow:0,
				spinner:"off",
				stopLoop:"off",
				stopAfterLoops:-1,
				stopAtSlide:-1,
				shuffle:"off",
				autoHeight:"off",
				hideThumbsOnMobile:"off",
				hideSliderAtLimit:0,
				hideCaptionAtLimit:0,
				hideAllCaptionAtLilmit:0,
				debugMode:false,
				fallbacks: {
					simplifyAll:"off",
					nextSlideOnWindowFocus:"off",
					disableFocusListener:false,
				}
			});
		}
	});	/*ready*/
		
	/* ==============================================
	Preloader
	=============================================== */
	try {
		jQuery(window).load(function() {
			jQuery("#preloader").delay(500).fadeOut(1000);
			jQuery(".preload-gif").addClass('fadeOutUp');

		});
	} catch (err) {

        }

    