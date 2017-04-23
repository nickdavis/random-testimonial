<?php
/**
 * Plugin Name: Random Testimonial
 * Plugin URI: http://designtowebsite.com/plugins
 * Description: Displays a single, random testimonial on the front end of your website. This plugin is aimed at developers and must be manually integrated into your theme.
 * Version: 1.0.0
 * Author: Nick Davis
 * Author URI: http://iamnickdavis.com
 *
 * This program is free software; you can redistribute it and/or modify it under the terms of the GNU
 * General Public License version 2, as published by the Free Software Foundation.  You may NOT assume
 * that you can use any other version of the GPL.
 *
 * This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY; without
 * even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
 *
 * @package Random Testimonial
 * @version 1.0.0
 * @author Nick Davis <nick@iamnickdavis.com>
 * @copyright Copyright (c) 2016, Nick Davis
 * @link http://iamnickdavis.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

add_action( 'init', 'nd_random_testimonial_register_post_type' );
/**
 * Create Testimonial post type
 * @since 1.0.0
 * @link http://codex.wordpress.org/Function_Reference/register_post_type
 */

function nd_random_testimonial_register_post_type() {
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
	);

	register_post_type( 'testimonial', $args );
}

add_action( 'wp_enqueue_scripts', 'nd_random_testimonial_scripts' );
/**
 * Enqueue scripts
 *
 * @since 1.0.0
 *
 * @return void
 */
function nd_random_testimonial_scripts() {
	wp_enqueue_script( 'nd-random-testimonial', plugins_url( '', __FILE__ ) . '/random-testimonial.js', array( 'jquery' ), '1.0.0', true );
	wp_localize_script( 'nd-random-testimonial', 'WP', array(
		'AJAX_URL' => admin_url( 'admin-ajax.php' ),
		'NONCE'    => wp_create_nonce( 'nd-random-testimonial' )
	) );
}

add_action( 'wp_ajax_nopriv_nd_random_testimonial_ajax', 'nd_random_testimonial_ajax' );
add_action( 'wp_ajax_nd_random_testimonial_ajax', 'nd_random_testimonial_ajax' );
/**
 * Generates the content for the AJAX output used in the testimonial
 *
 * @link http://wordpress.stackexchange.com/posts/140045/revisions
 */
function nd_random_testimonial_ajax() {
	$ajaxQuery = new WP_Query( array(
		'post_type'      => 'testimonial',
		'posts_per_page' => 1,
		'orderby'        => 'rand'
	) );

	ob_start();

	if ( $ajaxQuery->have_posts() ) :
		while ( $ajaxQuery->have_posts() ) : $ajaxQuery->the_post();
//			genesis_image( array(
//				'size' => 'testimonial',
//				'attr' => array(
//					'class' => 'animate'
//				)
//			) );
			echo '<p>' . get_the_content() . '</p>';
			echo '<p class="attribution">' . get_the_title() . '</p>';
		endwhile;
	endif;

	$htmlContent = ob_get_clean();
	echo $htmlContent;
	exit;
}

function nd_random_testimonial() {
	echo '<div class="testimonial"></div>';
}
