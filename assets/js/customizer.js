/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @since 2.1.0
 */
( function( $ ) {

    // Update the HTML in real time...
    wp.customize( 'nd_random_testimonial_title', function( value ) {
        value.bind( function( newval ) {
            $( '.random--testimonial__header' ).html( newval );
        } );
    } );

} )( jQuery );
