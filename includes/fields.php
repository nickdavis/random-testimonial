<?php
/**
 * Fields
 *
 * @package     NickDavis\RandomTestimonial
 * @since       3.0.0
 * @author      Nick Davis
 * @link        https://iamnickdavis.com
 * @license     GNU General Public License 2.0+
 */

namespace NickDavis\RandomTestimonial;

use Carbon_Fields\Container;
use Carbon_Fields\Field;

add_action( 'carbon_fields_register_fields', __NAMESPACE__ . '\add_byline_field' );
/**
 * Register a byline field with Carbon Fields.
 *
 * Byline fields can be used to show some text immediately after the testimonial
 * (person) name, for example a job title or company name, where the WordPress
 * theme supports it.
 *
 * @since 3.0.0
 */
function add_byline_field() {
	Container::make( 'post_meta', __( 'Byline', 'crb' ) )
	         ->where( 'post_type', '=', 'testimonial' )
	         ->add_fields( array(
		         Field::make( 'text', 'rt_byline', '' )
		              ->set_help_text( 'Text (e.g. a job title or company name) shown after the testimonial name, if your WordPress theme supports it' )
	         ) );
}
