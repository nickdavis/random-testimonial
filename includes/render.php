<?php
/**
 * Render
 *
 * @package     NickDavis\RandomTestimonial
 * @since       2.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

use WP_Query;

/**
 * Render the random testimonial.
 *
 * @since 2.0.0
 */
function do_random_testimonial() {
	$title = 'What customers say about us';
	$title = apply_filters( 'random_testimonial_title', $title );

	$args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 50,
	);

	$query = new WP_Query( $args );

	if ( ! $query ) {
		return;
	}

	$testimonials = array();

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$testimonials[] = array(
				'name'    => get_the_title(),
				'content' => base64_encode( wpautop( get_the_content() ) ),
			);
		endwhile;
	endif;

	wp_reset_postdata();

	$testimonials = json_encode( $testimonials );

	include RANDOM_TESTIMONIAL_DIR . 'views/random-testimonial.php';
}
