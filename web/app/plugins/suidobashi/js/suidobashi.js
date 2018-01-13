/**
 * Suidobashi JavaScript
 *
 * The main JavaScript file for Suidobashi.
 */
( function($) {

	/*
	* Mobile Main Menu.
	*/
	$('#site-nav').hide();
	$('#mobile-menu-toggle').on( 'click', function () {
		$('#site-nav').slideToggle('600');
		$('#site-nav').toggleClass('show-mobile-search');
    });

    /*
	* Searchform on Desktop layout.
	*/
	$('.search-toggle').on( 'click', function () {
		$('body').toggleClass('show-desktop-search');
	});

	/*
	* Scalable Videos via FitVids.
	*/
	$('#primary').fitVids();

	/*
	* Fade content in, if page loaded.
	*/
	$( window ).load( function() {

		// Show content
		$( '#spinner' ).fadeOut( 250, function() {
			$( this ).remove();
		} );
		$( '#primary' ).delay( 500 ).animate( {
			'opacity': 1
		}, 400 );
		$( '.intro-slogan' ).delay( 500 ).animate( {
			'opacity': 1
		}, 400 );

	});

} )(jQuery);