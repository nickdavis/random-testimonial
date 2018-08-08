<?php
/**
 * Taxonomy
 *
 * @package     NickDavis\RandomTestimonial
 * @since       2.1.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

add_action( 'init', __NAMESPACE__ . '\register_testimonial_type_taxonomy' );
/**
 * Register Testimonial Type taxonomy.
 *
 * @since 2.1.0
 */
function register_testimonial_type_taxonomy() {
	register_taxonomy(
		'testimonial-type',
		'testimonial',
		array(
			'label'              => __( 'Testimonial Type' ),
			'hierarchical'       => true,
			'public'             => false,
			'publicly_queryable' => true,
			'show_ui'            => true,
		)
	);
}
