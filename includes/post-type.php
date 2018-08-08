<?php
/**
 * Post Type
 *
 * @package     NickDavis\RandomTestimonial
 * @since       2.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

add_action( 'init', __NAMESPACE__ . '\register_testimonial_post_type' );
/**
 * Register Testimonial post type.
 *
 * @since 1.0.0
 * @since 2.1.0 Added Testimonal Type taxonomy
 */
function register_testimonial_post_type() {
	$labels = array(
		'name'               => 'Testimonials',
		'singular_name'      => 'Testimonial',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Testimonial',
		'edit_item'          => 'Edit Testimonial',
		'new_item'           => 'New Testimonial',
		'view_item'          => 'View Testimonial',
		'search_items'       => 'Search Testimonials',
		'not_found'          => 'No testimonials found',
		'not_found_in_trash' => 'No testimonials found in trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Testimonials'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => false,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'thumbnail' ),
		'menu_icon'          => 'dashicons-format-chat',
		'taxonomies'         => array( 'testimonial-type' ),
	);

	register_post_type( 'testimonial', $args );
}
