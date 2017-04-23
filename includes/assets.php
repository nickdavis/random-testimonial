<?php
/**
 * Assets
 *
 * @package     NickDavis\RandomTestimonial
 * @since       2.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_script' );
/**
 * Enqueue scripts
 *
 * @since 2.0.0
 *
 * @return void
 */
function enqueue_script() {
	wp_enqueue_script( 'random-testimonial', RANDOM_TESTIMONIAL_URL . '/assets/js/random-testimonial.js', array( 'jquery' ), '2.0.0', true );
}
