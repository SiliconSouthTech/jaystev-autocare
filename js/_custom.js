/* Main JS Scripts file dedicated to this template */

var domainroot="http://hogash.com/demo/kallyas_html/"; // Specify your domain below. The search results will only be made for your website
var hasChaser = 1;	// Enable Chaser menu (open on scroll) ?   1 - Yes / 0 - No
/*
* Closure for Page Load
*/
(function($, window, document) {

	"use strict";

	/**
	 * Define global vars
	 */
	var $window = $(window);

	/* Chaser Menu */ 
	var doc = $(document),
	    chaser = $('#main-menu > ul'),
	    forch = 300,
	    visible = false;

	if(hasChaser == 1) {
	    chaser.clone()
	        .appendTo(document.body)
	        .wrap('<div class="chaser"><div class="container"><div class="row"><div class="col-md-12"></div></div></div></div>');

	    var _content = $('#content'),
	        _chaser = $('body .chaser');

	    if(_content && _content.length > 0) {
	        forch = _content.first();
	        forch = forch.offset().top;
	    }

	    if(doc.scrollTop() > forch) {
	        _chaser.addClass('visible');
	        visible = true;
	    }

	    $(window).on('scroll', function() {
	        if (!visible && doc.scrollTop() > forch ) {
	            _chaser.addClass('visible');
	            visible = true;
	        }
	        else if (visible && doc.scrollTop() < forch ) {
	            _chaser.removeClass('visible');
	            visible = false;
	        }
	    });
	}
	/* end Chaser menu */
	
	var __wpk__ = {
        added : false,
        updateChaserMenu : function()
        {
			var chaserMenu = $('.chaser'),
			// find menu
				mainMenu = $('#menu-main-menu', chaserMenu);
				
				
			if(chaserMenu.hasClass('visible'))
			{
				if(! __wpk__.added)
                {
					// !! Clone the main menu
					var mainMenuClone = mainMenu.clone(true);
					
					// clear content
					chaserMenu.empty();
				
					// Get references to the elements to add in the chaser bar
					var oldTopBar = $('.kl-top-header'),
						oldLogoContainer = $('.logo-container'),
						oldCtaButton = $('#ctabutton');
 
					// Clone the elements
					var topBarClone = oldTopBar.clone(true),
						logoContainerClone = oldLogoContainer.clone(true),
						ctaButtonClone = oldCtaButton.clone(true);
						
					// Create new html structure
					chaserMenu.append('<div class="container"><div class="row" id="chaserMenuRow"></div></div>');
					$('#chaserMenuRow', chaserMenu)
						.append('<div class="col-sm-2 col-md-2" id="left-container"></div>')
						.append('<div class="col-sm-10 col-md-10" id="right-container"></div>');
						
					// Add logo
					$('#left-container').append(logoContainerClone);

					// Add the content in the right area
					$('#right-container')
						// Adding top bar
						.append('<div id="_wpk-custom-bar" class="col-sm-12 col-md-12"></div>')
						// add main menu
						.append('<div id="wpk-main-menu" class="col-sm-11 col-md-11"></div>')
						// Add cta button
						.append('<div id="_wpk-cta-button" class="col-sm-1 col-md-1"></div>');

					// Add content in the newly created sections
					$('#_wpk-custom-bar').append(topBarClone);
					$('#wpk-main-menu').append(mainMenuClone);
					$('#_wpk-cta-button').append(ctaButtonClone);
					
					// !! private
					__wpk__.added = true;
				}
			}
		}    
	};
 
    $(window).scroll(function(){
        __wpk__.updateChaserMenu();
    });



	/**
     * RESPONSIVE MENU // DO NOT TOUCH! (unless you know what you're doing)
     */

    var page_wrapper = $('#page_wrapper'),
        responsive_trigger = $('.zn-res-trigger'),
        zn_back_text = 'Back',
        back_text = '<li class="zn_res_menu_go_back"><span class="zn_res_back_icon glyphicon glyphicon-chevron-left"></span><a href="#">'+zn_back_text+'</a></li>',
        cloned_menu = $('#main-menu > ul').clone().attr({id:"zn-res-menu", "class":""});

    var start_responsive_menu = function(){

        var responsive_menu = cloned_menu.prependTo(page_wrapper);

        // BIND OPEN MENU TRIGGER
        responsive_trigger.click(function(e){
            e.preventDefault();
            
            responsive_menu.addClass('zn-menu-visible');
            set_height();

        });

        // ADD ARROWS TO SUBMENUS TRIGGERS
        responsive_menu.find('li:has(> ul)').addClass('zn_res_has_submenu').prepend('<span class="zn_res_submenu_trigger glyphicon glyphicon-chevron-right"></span>');
        // ADD BACK BUTTONS
        responsive_menu.find('.zn_res_has_submenu > ul').addBack().prepend(back_text);

        // REMOVE BACK BUTTON LINK
        $( '.zn_res_menu_go_back' ).click(function(e){
            e.preventDefault();
            var active_menu = $(this).closest('.zn-menu-visible');
            active_menu.removeClass('zn-menu-visible');
            set_height();
            if( active_menu.is('#zn-res-menu') ) {
                page_wrapper.css({'height':'auto'});
            }
        });

        // OPEN SUBMENU'S ON CLICK
        $('.zn_res_submenu_trigger').click(function(e){
            e.preventDefault();
            $(this).siblings('ul').addClass('zn-menu-visible');
            set_height();
        });

    }

    var set_height = function(){
        var height = $('.zn-menu-visible').last().css({height:'auto'}).outerHeight(true),
            window_height  = $(window).height(),
            adminbar_height = 0,
            admin_bar = $('#wpadminbar');

        // CHECK IF WE HAVE THE ADMIN BAR VISIBLE
        if(height < window_height) {
            height = window_height;
            if ( admin_bar.length > 0 ) {
                adminbar_height = admin_bar.outerHeight(true);
                height = height - adminbar_height;
            }
        }

        $('.zn-menu-visible').last().attr('style','');
        page_wrapper.css({'height':height});
    };

    // MAIN TRIGGER FOR ACTIVATING THE RESPONSIVE MENU
    var menu_activated = false,
        triggerMenu = function(){
            if ( $(window).width() < 1200 ) {
                if ( !menu_activated ){
                    start_responsive_menu();
                    menu_activated = true;
                }
                page_wrapper.addClass('zn_res_menu_visible');
            }
            else{
                // WE SHOULD HIDE THE MENU
                $('.zn-menu-visible').removeClass('zn-menu-visible');
                page_wrapper.css({'height':'auto'}).removeClass('zn_res_menu_visible');
            }
        };
    $(document).ready(function() {
        triggerMenu();
    });
    $( window ).on( 'resize' , function(){
       triggerMenu();
    });


	/* Search panel */
	var searchBtn = $('#search').children('.searchBtn'),
		searchPanel = searchBtn.next(),
		searchP = searchBtn.parent();
	searchBtn.click(function(e){
		e.preventDefault();
		var _t = $(this);
		if(!_t.hasClass('active')) {
			_t.addClass('active')
			.find('span')
			.removeClass('glyphicon-search icon-white')
			.addClass('glyphicon-remove');
			searchPanel.show();
		} else {
			_t.removeClass('active')
			.find('span')
			.addClass('glyphicon-search icon-white')
			.removeClass('glyphicon-remove');
			searchPanel.hide();
		}
	}); // searchBtn.click //
	$(document).click(function(){
		searchBtn.removeClass('active')
			.find('span')
			.addClass('glyphicon-search icon-white')
			.removeClass('glyphicon-remove');
		searchPanel.hide(0);
	});
	searchP.click(function(event){
		event.stopPropagation();
	});
	/* end search panel */


	/* Scroll to top */ 
	if ($('#totop').length) {
	    var scrollTrigger = 100, // px
        backToTop = function () {
            var scrollTop = $(window).scrollTop();
            if (scrollTop > scrollTrigger) {
                $('#totop').addClass('show');
            } else {
                $('#totop').removeClass('show');
            }
        };
	    backToTop();
	    $(window).on('scroll', function () {
	        backToTop();
	    });
	    $('#totop').on('click', function (e) {
	        e.preventDefault();
	        $('html,body').animate({
	            scrollTop: 0
	        }, 700);
	    });
	}
	/* end Scroll to top */


	/*  Load Date in the current div */
	$.ajax({
	  url: "php_helpers/date.php",
	  success: function(data){
		$("#current-date").html(data);
	  }
	});
	/* end Load Date in the current div */

	/**
	 * Kallyas Videos
	 * Based on easy background video plugin
	 * Example data setup attribute:
	 * data-setup='{ "position": absolute, "loop": true , "autoplay": true, "muted": true, "mp4":"", "webm":"", "ogg":""  }'
	 */
		$('.kl-video').each(function(index, el) {
			var $video = $(el),
				_vid_controls = $video.next('.kl-video--controls'),
				_vid_playplause = _vid_controls.find('.btn-toggleplay'),
				_vid_audio = _vid_controls.find('.btn-audio'),
				_data_attribs = $video.attr("data-setup"),
				_options = typeof _data_attribs != 'undefined' ? JSON.parse(_data_attribs) : '{}';

			if(_options.height_container == true)
				$video.closest('.kl-video-container').css('height', $video.height());

			if(_options.hasOwnProperty('muted') && _options.muted == true) _vid_audio.children('i').addClass('mute');
			if(_options.hasOwnProperty('autoplay') && _options.autoplay == false) _vid_playplause.children('i').addClass('paused');

			if(typeof video_background != 'undefined') {
				var Video_back = new video_background( $video,
					{
						//Stick within the div or fixed
						"position": _options.hasOwnProperty('position') ? _options.position : "absolute",
						//Behind everything
						"z-index": _options.hasOwnProperty('zindex') ? _options.zindex : "-1",

						//Loop when it reaches the end
						"loop": _options.hasOwnProperty('loop') ? _options.loop : true,
						//Autoplay at start
						"autoplay": _options.hasOwnProperty('autoplay') ? _options.autoplay : false,
						//Muted at start
						"muted": _options.hasOwnProperty('muted') ? _options.muted : true,

						//Path to video mp4 format
						"mp4": _options.hasOwnProperty('mp4') ? _options.mp4 : false,
						//Path to video webm format
						"webm": _options.hasOwnProperty('webm') ? _options.webm : false,
						//Path to video ogg/ogv format
						"ogg": _options.hasOwnProperty('ogg') ? _options.ogg : false,
						//Path to video flv format
						"flv": _options.hasOwnProperty('flv') ? _options.flv : false,
						//Fallback image path
						"fallback_image": _options.hasOwnProperty('poster') ? _options.poster : false,
						// Youtube Video ID
						"youtube": _options.hasOwnProperty('youtube') ? _options.youtube : false,

						// flash || html5
						"priority": _options.hasOwnProperty('priority') ? _options.priority : "html5",
						// width/height -> If none provided sizing of the video is set to adjust
						"video_ratio": _options.hasOwnProperty('video_ratio') ? _options.video_ratio : false,
						// fill || adjust
						"sizing": _options.hasOwnProperty('sizing') ? _options.sizing : "fill",
						// when to start
						"start": _options.hasOwnProperty('start') ? _options.start : 0
					});
				//Toggle play status
				_vid_playplause.on('click',function(e){
					e.preventDefault();
					Video_back.toggle_play();
					$(this).children('i').toggleClass('paused');
				});
				//Toggle mute
				_vid_audio.on('click',function(e){
					e.preventDefault();
					Video_back.toggle_mute();
					$(this).children('i').toggleClass('mute');
				});	
			}
		});
	/* end Kallyas Videos */

	/* Magnific Popup */
		if(typeof($.fn.magnificPopup) != 'undefined')
			{
				$('a.kl-login-box').magnificPopup({
					type: 'inline',
					closeBtnInside:true,
					showCloseBtn: true,
					mainClass: 'mfp-fade mfp-bg-lighter'
				});

				$('a[data-lightbox="image"]:not([data-type="video"])').each(function(i,el){
					//single image popup
					if ($(el).parents('.gallery').length == 0) {
						$(el).magnificPopup({
							type:'image',
							tLoading: '',
							mainClass: 'mfp-fade'
						});
					}
				});
			 	$('.mfp-gallery.images').each(function(i,el) {
					$(el).magnificPopup({
						delegate: 'a',
						type: 'image',
						gallery: {enabled:true},
						tLoading: '',
						mainClass: 'mfp-fade'
					});
				});
				// Notice the .misc class, this is a gallery which contains a variatey of sources
				// links in gallery need data-mfp attributes eg: data-mfp="image"
				$('.mfp-gallery.misc a[data-lightbox="mfp"]').magnificPopup({
					mainClass: 'mfp-fade',
					type: 'image',
					gallery: {enabled:true},
					tLoading: '',
					callbacks: {
						elementParse: function(item) {
							item.type = $(item.el).attr('data-mfp');
						}
					}
				});
				$('a[data-lightbox="iframe"]').magnificPopup({type: 'iframe', mainClass: 'mfp-fade', tLoading: ''});
				$('a[data-lightbox="inline"]').magnificPopup({type: 'inline', mainClass: 'mfp-fade', tLoading: ''});
				$('a[data-lightbox="ajax"]').magnificPopup({type: 'ajax', mainClass: 'mfp-fade', tLoading: ''});
				$('a[data-lightbox="youtube"], a[data-lightbox="vimeo"], a[data-lightbox="gmaps"], a[data-type="video"]').magnificPopup({
					disableOn: 700,
					type: 'iframe',
					removalDelay: 160,
					preloader: true,
					fixedContentPos: false,
					mainClass: 'mfp-fade',
					tLoading: ''
				});

				// Enable WooCommerce lightbox
				$('.single_product_main_image .images a').magnificPopup({
					mainClass: 'mfp-fade',
					type: 'image',
					gallery: {enabled:true},
					tLoading: '',
				});
		}
	/* end Magnific Popup */

	/* Flickr Feed */
		var content = $('.flickrfeed'),
		elements = content.find('.flickr_feeds');
		if(elements && elements.length){
			$.each(elements, function(i, e){
				var self = $(e),
					ff_limit = (self.attr('data-limit') ? self.attr('data-limit') : 6),
					fid = self.attr('data-fid');
				if(typeof($.fn.jflickrfeed) != 'undefined') {
					self.jflickrfeed({
						limit: ff_limit,
						qstrings: { id: fid },
						itemTemplate: '<li><a href="{{image_b}}" data-lightbox="image"><img src="{{image_s}}" alt="{{title}}" /><span class="theHoverBorder"></span></a></li>'
					},
					function(data) {
						self.find(" a[data-lightbox='image']").magnificPopup({type:'image', tLoading: ''});
						self.parent().removeClass('loadingz');
					});
				}
			});
		}
	/* end Flickr Feed */

	/* Tonext button - Scrolls to next block (used for fullscreen slider) */
	$(".js-tonext-btn").on('click',function (e) {
		e.preventDefault();
		var endof = $(this).attr('data-endof') ? $(this).attr('data-endof') : false,
			dest = 0;

		if ( endof )
			dest = $(endof).height() + $(endof).offset().top;

		//go to destination
		$('html,body').animate({scrollTop: dest}, 1000, 'easeOutExpo');
	});

	/* Blog Isotope item */
	var enable_blog_isotope = function( scope ){
	var elements = scope.find( '.zn_blog_columns' );
		if( elements.length == 0) { return; }
		elements.imagesLoaded( function() {
	        elements.isotope({
	            itemSelector: ".blog-isotope-item",
	            animationEngine: "jquery",
	            animationOptions: {
	                duration: 250,
	                easing: "easeOutExpo",
	                queue: false
	            },
	            filter: '',
	            sortAscending: true,
	            sortBy: ''
	        });
        });
	};
	var blog_isotope = $('.zn_blog_archive_element');
	if(blog_isotope){
		enable_blog_isotope ( blog_isotope );	
	}


	// Latest & Bestsellers carousels
	$('.shop-latest-carousel > ul').each(function(index, element) {
		$(this).carouFredSel({
			responsive: true,
			scroll: 1,
			auto: false,
			height: 437,
			items: {
				width:260, 
				visible: {
					min: 1, 
					max: 4 
				} 
			},
			prev	: {	button : $(this).parent().find('a.prev'), key : "left" },
			next	: { button : $(this).parent().find('a.next'), key : "right" },
		});
	});

	var enable_shop_limited_offers = function( content ){
		var elements = content.find('.zn_limited_offers');
		if(elements && (typeof($.fn.carouFredSel) != 'undefined')){
		    $.each(elements, function(i, e){
		        var self = $(e);
		        self.carouFredSel({
		            responsive: true,
		            width: '92%',
		            scroll: 1,
		            /*auto: true,*/
		            items: {
		            	width:190, 
		            	visible: { 
		            		min: 2,
		            		max: 4 
		            	} 
		            },
		            prev	: {
		                button	: function(){return self.closest('.limited-offers-carousel').find('.prev');},
		                key		: "left"
		            },
		            next	: {
		                button	: function(){return self.closest('.limited-offers-carousel').find('.next');},
		                key		: "right"
		            }
		        });		    
		    });
		}
	};
	var shop_limited_carousel = $('.limited-offers-carousel');
	if(shop_limited_carousel){
		enable_shop_limited_offers ( shop_limited_carousel );	
	}

	// Price Filter
    var priceRange = $( ".price-range-slider" );
    $.each(priceRange, function(index, val) {
        var _t = $(this),
            priceResult = _t.parent().find(".price-result"),
            currency = priceResult.data('currency');
           
        _t.slider({
            range: true,
            min: 0,
            max: 500,
            values: [ 75, 300 ],
            slide: function( event, ui ) {
                priceResult.val( currency + ui.values[ 0 ] + " - "+ currency + ui.values[ 1 ] );
            }
        });
        priceResult.val( currency + _t.slider( "values", 0 ) + " - " + currency + _t.slider( "values", 1 ) );
    });
		

	/* Form Validation & Send Mail code */
	$.each($('.contactForm form'), function(index, el) {
		var cform = $(el),
			cResponse = $('<div class="cf_response"></div>');
		cform.prepend(cResponse);
		cform.h5Validate();

		cform.submit(function(e) {
			e.preventDefault();
			if(cform.h5Validate('allValid')) {
				cResponse.hide();
				$.post(
					$(this).attr('action'),
					cform.serialize(),
					function(data){
						cResponse.html(data).fadeIn('fast');
						if(data.match('success') != null) {
							cform.get(0).reset();
						}
					}
				); // end post
			}
			return false;
		});
	});

	// Check portfolio content
	var elements = $('.portfolio-item-more-toggle');
	if(elements){
		$.each(elements, function(a,b){
			var element = $(b);
			element.on('click', function(e){
				e.preventDefault();
				e.stopPropagation();
				var eTarget = element.parents('.portfolio-item-desc').first();
				eTarget.toggleClass('is-opened');
			});
		});
	}

	// whatever toggle 2 here
	elements = $('.kl-contentmaps__panel-tgg');
	if(elements){
		elements.each(function(a, b){
			var element = $(b);
			element.on('click', function(e){
				e.preventDefault();
				e.stopPropagation();
				var targetElement = $(element.data('target'));
				if(targetElement){
					var toggleClass = element.data('targetClass');
					if(toggleClass){
						targetElement.toggleClass(toggleClass);
					}
				}
			});
		});
	}

	// .kl-ib-point-active => activates the dot (see :hover)

	elements = $('.kl-iconbox');
	if(elements){
		$.each(elements, function(a,b){
			var element = $(b),
				target = $(element.data('targetElement')); // data-target-element="kl-ib-point-1"
			if(target){
				element.on('mouseenter', function(e){
					target.addClass('kl-ib-point-active');
				}).on('mouseleave', function(){
					target.removeClass('kl-ib-point-active');
				});
			}			
		});
	}

	/* MailChimp working newsletter */
	/* read more http://stackoverflow.com/a/15120409/477958 */
    function register($form) {
        $.ajax({
            type: $form.attr('method'),
            url: $form.attr('action'),
            data: $form.serialize(),
            cache       : false,
            dataType    : 'json',
            contentType: "application/json; charset=utf-8",
            error       : function(err) {
                var themessage = $('<span class="alert alert-danger"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button>Could not connect to server. Please try again later.</span>');
                $('#notification_container').html(themessage);
                setTimeout(function(){
                    themessage.addClass('animate');
                }, 300)
            },
            success     : function(data) {
                if (data.result != "success") {
                    var message = data.msg.substring(4),
                    themessage = $('<span class="alert alert-warning"><button type="button" class="close icon-close" data-dismiss="alert" aria-hidden="true"></button>'+message+'</span>');
                    $('#notification_container').html(themessage);
                    setTimeout(function(){
                        themessage.addClass('animate');
                    }, 300);
                } 
                else {
                    var message = data.msg,
                    themessage = $('<span class="success alert alert-success"><button type="button" class="close" data-dismiss="alert" aria-hidden="true"></button>'+message+'</span>');
                    $('#notification_container').html(themessage);
                    setTimeout(function(){
                        themessage.addClass('animate');
                    }, 300)
                }
            }
        });
    }
    var $form = $('#bounty_form');
    $('payWithPaystack').on('click', function(event) {
        if(event) event.preventDefault();
        register($form);
    });

    var $form = $('#pay_form');
    $('#mc-embedded-subscribe').on('click', function(event) {
        if(event) event.preventDefault();
         document.getElementById("mc-embedded-subscribe").style.display = "none"; // to undisplay
   		document.getElementById("buttonreplacement").style.display = ""; // to display
        $.ajax({
                url: $form.attr('action'),
                type: 'POST',
                data: $form.serialize(),
                success: function(result) {

                    var str  = pay_form.email.value;
	  	var email = str.replace('_','@');
   /* if(pay_form.amount.value == "") || 
    {
alert('Amount column cannot be empty!');

    }
    if(parseFloat(pay_form.amount.value) <= 99 )
    {
        alert('The minimum amount you can enter is 100!');

    }*/
	  var amount = parseFloat(pay_form.amount.value) * 100;
	  var ref = pay_form.ref.value;
	  var currency = pay_form.currency.value;
	  var base_url = pay_form.base_url.value;
    var handler = PaystackPop.setup({
      key: 'pk_test_5d1e7e4871973bbf114430cc74e0ad7018588a0b',
      email: ''+ email,
      amount: amount,
      ref: ref,
      currency: currency,
      callback: function(response){
		  //window.location = base_url+'bounty/verify/'+ response.trxref;
          //alert('success. transaction ref is ' + response.trxref);

          //verify transaction via ajax
          $.ajax({url: base_url+'bounty/verify/'+ response.trxref, 
          	success: function(result){
        	alert('sucess.')
    		}});
      },
      onClose: function(){
          //alert('window closed');

          //delete  or update status as abandoned

          //change button display

          document.getElementById("mc-embedded-subscribe").style.display = ""; // to undisplay
   		document.getElementById("buttonreplacement").style.display = "none"; // to display

      }
    });
    handler.openIframe();
    //alert('i am working');
                }
            });
        
    });

var invalid_email;
            var paystackHandler;

            function validateEmail(email) {
                var re = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
                return re.test(email);
            }

            $('#amount').autoNumeric('init');
            var sAmount = document.getElementById("amount").value;
           

            var typingTimer;
            $('#donation-email').on('keyup', function() {
                clearTimeout(typingTimer);
                var email = $(this).val();
                var parent = $(this).parent();
                var email_helper = $(this).siblings('.help-block');
                typingTimer = setTimeout(function() {
                    if (validateEmail(email)) {
                        if (invalid_email) {
                            parent.removeClass('has-error');
                            email_helper.addClass('hidden');
                            invalid_email = false;
                        }
                    } else {
                        if (!invalid_email) {
                            parent.addClass('has-error');
                            email_helper.removeClass('hidden')
                            invalid_email = true;
                        }
                    }
                }, 500);
            });

            $('#currency').on('change', function() {
                
                 var currency = $("#currency option:selected").val();
                 $('#showCurrency').html(' '+currency+' ');
                
            });

            $('#amount').on('change', function() {
                var amount = $(this).val();
                var parent = $(this).parent();
                 var currency = $("#currency option:selected").val();
                $('#showAmount').html(' '+amount+' ');
                var amount_helper = $(this).siblings('.help-block');
                if (amount < 100.00) {
                    parent.addClass('has-error');
                    amount_helper.removeClass('hidden');
                } else {
                    parent.removeClass('has-error');
                    amount_helper.addClass('hidden');
                }
            });

            $(document).ready(function (){
			    validate();
			    $('#first_name, #last_name, #address_1, #address_2, #town_city, #state, #postcode, #amount, #email, #phone').change(validate);
			});

			function validate(){
			    if ($('#first_name').val().length   >   0   &&
			    	$('#last_name').val().length   >   0   &&
			    	$('#address_1').val().length   >   0   &&
			    	$('#address_2').val().length   >   0   &&
			    	$('#town_city').val().length   >   0   &&
			    	$('#state').val().length   >   0   &&
			    	$('#postcode').val().length   >   0   &&
			    	$('#amount').val().length   >   0   &&
			        $('#email').val().length  >   0   &&
			        $('#phone').val().length    >   0) {
			        $("input[type=submit]").prop("disabled", false);
			    }
			    else {
			        $("input[type=submit]").prop("disabled", true);
			    }
			}

            $('#donation-btn').click(function(e) {
                e.preventDefault();

                var donation_btn = $(this);
                var ref = 'PaystackDemo' + Math.floor(Math.random()*90000) + 10000;
                var no_donation_email = $('#donation-email').val().length == 0;
                var donation_value = $('#amount').autoNumeric('get');

                if (no_donation_email || invalid_email) {

                    $('.donation-form.email').addClass('has-error');
                    $('.email .help-block').removeClass('hidden');
                    return;
                }

                if (donation_value < 100) {

                    $('.donation-form.amount').addClass('has-error');
                    $('.amount .help-block').removeClass('hidden');
                    return;
                }

                paystackHandler = PaystackPop.setup({
                    key: 'pk_live_3223432j3328nmdsad233tIshFeQd4XMUh',
                    email: $('#donation-email').val(),
                    amount: parseFloat(donation_value) * 100,
                    ref: ref,
                    onClose: function() {
                        donation_btn.attr('disabled', false).html('Make Payment');
                    },
                    callback: function(response) {
                        $("#donation-form, .demo-talk").addClass('hidden');
                        $("#success-message").removeClass('hidden').find('#trans-ref').text(response.trxref);
                    }
                })
                paystackHandler.openIframe();
                donation_btn.attr('disabled', true).html('<i class="fa fa-spinner fa-spin"></i>');
            })

            $("#donate-again").click(function() {
                $("#donation-form, .demo-talk").removeClass('hidden').find("#amount").val("").focus();
                $("#success-message").addClass('hidden').find('#trans-ref').text("");
                $('#donation-btn').attr('disabled', false).html('Make another Payment');
            })
    

    /**
	 * Bubble Boxes
	 */
	$('.bubble-box').each(function(index, el) {
		var $el = $(el),
			$revealAt = $el.attr('data-reveal-at'),
			$hideAfter = $el.attr('data-hide-after'),
			defaultRevealAt = 1000; // default reveal when scrolling is at xx px
		if(typeof $revealAt == 'undefined' && $revealAt.length <= 0) $revealAt = defaultRevealAt;
		$window.smartscroll(function(event) {
			// reveal the popup
			if ($el.length > 0 && $(window).scrollTop() > $revealAt && (!$el.hasClass('bb--anim-show') && !$el.hasClass('bb--anim-hide'))){
				$el.addClass("bb--anim-show");
				// check if hide after is defined and hide the popupbox
				if(typeof $hideAfter != 'undefined' && $hideAfter.length >= 0) {
					setTimeout(function(){
						$el.removeClass('bb--anim-show').addClass('bb--anim-hide').one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd',
							function() {
								$(this).remove();
						});
					}, $hideAfter)
				}
			}
		});
		$el.find('.bb--close').on('click', function(){
			$el.addClass('bb--anim-hide').one('animationend webkitAnimationEnd oAnimationEnd MSAnimationEnd',
				function() {
					$(this).remove();
			});
		});

	});

	/**
	 * Popup Box
	 * Works with Magnific popup to open them
	 * data-ppbox-timeout attribute needed to specify the timeout to appear
	 */
	$('.kl-pp-box[data-ppbox-timeout]').each(function(index, el) {

		var $el = $(el),
			pptimeout = $el.attr('data-ppbox-timeout'),
			timeout = (typeof pptimeout == 'undefined' && $(pptimeout).length <= 0) ? pptimeout : 8000;

		var cookieExpireAttr = $el.attr('data-cookie-expire'),
			cookieExpire = (typeof cookieExpireAttr !== 'undefined') ? cookieExpireAttr : 2;

		// Remove cookie if  you want to test
		// $.removeCookie('ppbox', { path: '/' });

		// check if cookie exists
		if(!$.cookie('ppbox')) {
			// show the popupbox
			var timer = setTimeout(function(){
				$.magnificPopup.open({
					items: {
						src: $($el.get(0))
					},
					type: 'inline',
					mainClass: 'mfp-fade mfp-bg-lighter',
					tLoading: ''
				});
			}, timeout);
		}
		// Set cookie and close popup
		$(el).find('.dontshow').on('click',function(e){
			e.preventDefault();
			// Add cookie support
			$.cookie('ppbox', 'hideit', { expires: parseInt(cookieExpire), path: '/' });
			//Close Popup
			$.magnificPopup.close();
		});

	});

	// Login pop-up
	$('.popup-with-form, .popup-with-form2').magnificPopup({
          closeBtnInside:true,
          type: 'inline',
          preloader: false,
          focus: '#name',

          // When elemened is focused, some mobile browsers in some cases zoom in
          // It looks not nice, so we disable it:
          callbacks: {
            beforeOpen: function() {
              if($(window).width() < 700) {
                this.st.focus = false;
              } else {
                this.st.focus = '#name';
              }
            }
          }
        });


    // ******* Tweets in Footer
	/*
	* ### HOW TO CREATE A VALID ID TO USE: ### 
	* Go to www.twitter.com and sign in as normal, go to your settings page. 
	* Go to Widgets on the left hand side. 
	* Create a new widget for what you need eg user timeline or search etc.  
	* Feel free to check exclude replies if you dont want replies in results. 
	* Now go back to settings page, and then go back to widgets page, you should 
	* see the widget you just created. Click edit. 
	* Now look at the URL in your web browser, you will see a long number like this: 
	* 345735908357048478 
	* Use this as your ID below instead! 
	*/
	twitterFetcher.fetch('690211574779396097', 'twitterFeed', 1, true, false);


})(window.jQuery, window, document);