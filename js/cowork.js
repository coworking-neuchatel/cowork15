( function( $ ) {

	/**
	 * A function to move the hero image behind the header.
	 */
	function hero_image() {

		var body, header, header_height, hero, window_width;

		body = $( 'body' );
		header = $( '.site-header' );
		header_height = header.outerHeight();
		if ( $( '.site-top-content' ).length ) {
			header_height = header_height - $( '.site-top-content' ).outerHeight();
		}
		hero = $( '.hero' );
		window_width = $( window ).width();

		if ( body.hasClass( 'hero-image' ) && window_width >= 1230 ) {
			header.css( 'margin-bottom', - header_height );
			
			if ( body.hasClass( 'red-circle' ) ) {
				hero.css( 'padding-top', 100 + header_height );
			} else if ( hero.hasClass( 'with-featured-image' ) ) {
				hero.css( 'padding-top', 216 + header_height );
			} else {
				hero.css( 'padding-top', 144 + header_height );
			}
		} else if ( body.hasClass( 'hero-image' ) && window_width >= 1020 ) {
			header.css( 'margin-bottom', - header_height );
			
			if ( body.hasClass( 'red-circle' ) ) {
				hero.css( 'padding-top', 60 + header_height );
			} else if ( hero.hasClass( 'with-featured-image' ) ) {
				hero.css( 'padding-top', 144 + header_height );
			} else {
				hero.css( 'padding-top', 96 + header_height );
			}
		} else {
			header.css( 'margin-bottom', '' );
			hero.css( 'padding-top', '' );
		}

	}

	$( window ).load( hero_image ).resize( hero_image );
	
	
	/*
	 * FrontPage Menus
	 * activate when < 680 PX
	*/
	   
	$( ".bloc-a"  ).on("click", ".bloc-a-header", function(){
	 		 	
		var target = $( this ).next(".bloc-a-content");
		var parent = $( this ).parent();
		
		if($(window).innerWidth() < 680 ) {
		   var state = target.data( "toggle" );
		   if ( state == "open") {
		     target.hide().data( "toggle", "closed" );
		   } else {
		     target.show().data( "toggle", "open" );
		   }
			 
			 parent.toggleClass( "state-open" );
	 	}
	 });
	 
	 
	$( ".lego"  ).on("click", ".lego-title", function(){
	 	
		var target = $( this ).next(".lego-content");
		var parent = $( this ).parent();
		
		if($(window).innerWidth() < 680 ) {
			var state = target.data( "toggle" );
			if ( state == "open") {
			  target.hide().data( "toggle", "closed" );
				
			} else {
			  target.show().data( "toggle", "open" );
			}
			
			parent.toggleClass( "state-open" );
		}
	});
	
	
	/* Bloc Trio: compter images 
	
	 - On compte les images des bloc-trio pour afficher le nombre.
	 - On utilise JS pour les compter, car le HTML est produit par le shortcode "gallery".
	 - On compte le nombre d'éléments gallery-item dans l'élément ".bloc-trio .gallery"
	 - On ajoute ce nombre...
	 *
	*/
	
	// 
	

} )( jQuery );
