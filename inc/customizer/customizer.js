/**
 * Theme Customizer enhancements for a better user experience.
 *
 * Contains handlers to make Theme Customizer preview reload changes asynchronously.
 */

( function( $ ) {
	
    //Основной цвет элементов
	wp.customize( 'default_color', function( value ) {
		value.bind( function( to ) {
			$( '.btn-default' ).css( 'background-color', to );
		});
	});
    
    //цвет акцента
	wp.customize( 'true_akcent_color', function( value ) {
		value.bind( function( to ) {
			$( '.akcent' ).css( 'background-color', to );
			$( '.akcentf' ).css( 'color', to ); // ко всему тексту применяем заданный цвет
		} );
	});
	//цвет текста
	wp.customize( 'true_text_color', function( value ) {
		value.bind( function( to ) {
			$( 'body' ).css( 'color', to );
			$( '.akcentf' ).css( 'color', to ); // ко всему тексту применяем заданный цвет
		} );
	});
	//цвета ссылок
	wp.customize( 'true_link_color', function( value ) {
		value.bind( function( to ) {
			$( 'a' ).css( 'color', to ); // ко всем ссылкам применяем заданный цвет
		} );
	});
	wp.customize( 'zagolovok1_index', function( value ) {
		value.bind( function( to ) {
			$( '#1section' ).text( to );
		});
	});
	wp.customize( 'email_header', function( value ) {
		value.bind( function( to ) {
			$( '#semail' ).text( to );
		});
	});
	wp.customize( 'phone_header', function( value ) {
		value.bind( function( to ) {
			$( '#sphone' ).text( to );
		});
	});
	// Site title and description.
	wp.customize( 'blogname', function( value ) {
		value.bind( function( to ) {
			$( '.site-title a' ).text( to );
		} );
	} );
	wp.customize( 'blogdescription', function( value ) {
		value.bind( function( to ) {
			$( '.site-description' ).text( to );
		} );
	} );
	// Header text color.
	wp.customize( 'header_textcolor', function( value ) {
		value.bind( function( to ) {
			if ( 'blank' === to ) {
				$( '.site-title, .site-description' ).css( {
					'clip': 'rect(1px, 1px, 1px, 1px)',
					'position': 'absolute'
				} );
			} else {
				$( '.site-title, .site-description' ).css( {
					'clip': 'auto',
					'color': to,
					'position': 'relative'
				} );
			}
		} );
	} );
} )( jQuery );
