<?php
/**
 * Customizer handler.
 *
 * @package     NickDavis\RandomTestimonial
 * @since       2.1.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

use WP_Customize_Control;

add_action( 'customize_register', __NAMESPACE__ . '\register_with_customizer' );
/**
 * Register settings and controls with the Customizer.
 *
 * @link https://wordpress.stackexchange.com/questions/247234/how-do-i-implement-selective-refresh-with-a-customizer-setting
 *
 * @since 2.1.0
 */
function register_with_customizer() {
	$prefix = 'nd';

	global $wp_customize;

	/**
	 * Add section.
	 */
	$wp_customize->add_section( $prefix . '_random_testimonial', array(
		'title'    => __( 'Random Testimonial', 'hamiltonhealth' ),
		//'priority' => 100,
	) );

	/**
	 * Add settings.
	 */
	$wp_customize->add_setting( $prefix . '_random_testimonial_title', array(
		'default'           => __( '', 'hamiltonhealth' ),
		'sanitize_callback' => 'wp_kses_post',
		'transport'         => 'postMessage',
	) );

	/**
	 * Add controls.
	 */
	$wp_customize->add_control( new WP_Customize_Control(
			$wp_customize,
			$prefix . '_random_testimonial_title',
			array(
				'label'    => __( 'Title', 'hamiltonhealth' ),
				'section'  => $prefix . '_random_testimonial',
				'settings' => $prefix . '_random_testimonial_title',
				'type'     => 'text',
			)
		)
	);

	// Abort if selective refresh is not available.
	if ( ! isset( $wp_customize->selective_refresh ) ) {
		return;
	}

	// Adds selective refresh (for pencil icon).
	$wp_customize->selective_refresh->add_partial( $prefix . '_random_testimonial_title', array(
		'selector'            => '.random-testimonial__header',
		'container_inclusive' => true,
		'render_callback'     => 'NickDavs\RandomTestimonial\do_random_testimonial',
	) );
}

add_action( 'customize_preview_init', __NAMESPACE__ . '\enqueue_customizer_scripts' );
/**
 * Enqueues the 'live changes' Customizer script.
 *
 * @link https://codex.wordpress.org/Theme_Customization_API
 *
 * @since 2.1.0
 */
function enqueue_customizer_scripts() {
	wp_enqueue_script(
		'random-testimonial-customizer',
		RANDOM_TESTIMONIAL_URL . '/assets/js/customizer.js',
		array( 'jquery', 'customize-preview' ),
		'2.1.0',
		true
	);
}
