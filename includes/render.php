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
 * Renders the random testimonial.
 *
 * @todo Add a filter for the tax query
 *
 * @since 1.0.0
 *
 * @param string $view
 */
function do_random_testimonial( $view = '' ) {
	$div_class = apply_filters( 'random_testimonial_div_class', 'random-testimonial' );

	// Check for customizer, if not do fall back.
	$title = get_theme_mod( 'nd_random_testimonial_title' );

	if ( empty ( $title ) ) {
		$title_text    = apply_filters( 'random_testimonial_title', 'What customers say about us' );
		$heading_class = apply_filters( 'random_testimonial_heading_class', 'random--testimonial__title' );
		$heading_tag   = apply_filters( 'random_testimonial_heading_tag', 'h2' );

		$title = "<{$heading_tag} class=\"{$heading_class}\">{$title_text}</{$heading_tag}>";
	}

	$args = array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 50,
		'tax_query'      => array(
			array(
				'taxonomy' => 'testimonial-type',
				'field'    => 'slug',
				'terms'    => 'staff',
				'operator' => 'NOT IN'
			),
		),
	);

	$query = new WP_Query( $args );

	if ( ! $query ) {
		return;
	}

	$testimonials = array();

	if ( $query->have_posts() ) :
		while ( $query->have_posts() ) : $query->the_post();
			$testimonials[] = array(
				'name'      => get_the_title(),
				'byline'    => get_post_meta( get_the_ID(), '_rt_byline', true ),
				'content'   => wpautop( addslashes( htmlspecialchars( get_the_content(), ENT_QUOTES | ENT_SUBSTITUTE ) ) ),
				'image_url' => wp_get_attachment_image_url( get_post_thumbnail_id( get_the_ID() ), 'full' ),
			);
		endwhile;
	endif;

	wp_reset_postdata();

	$testimonials = json_encode( $testimonials );

	if ( empty( $view ) ) {
		include RANDOM_TESTIMONIAL_DIR . 'views/random-testimonial.php';
	} else {
		include $view;
	}
}
