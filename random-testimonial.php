<?php
/**
 * Plugin Name: Random Testimonial
 * Plugin URI: https://github.com/nickdavis/random-testimonial
 * Description: Displays a single, random testimonial on the front end of your website. This plugin is aimed at developers and must be manually integrated into your theme.
 * Version: 2.0.0
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
 * @version 2.0.0
 * @author Nick Davis <nick@iamnickdavis.com>
 * @copyright Copyright (c) 2016, Nick Davis
 * @link http://iamnickdavis.com
 * @license http://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit( 'Cheatin&#8217; uh?' );
}

// Define plugin constants
define( 'RANDOM_TESTIMONIAL_VERSION', '2.0.0' );
define( 'RANDOM_TESTIMONIAL_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
define( 'RANDOM_TESTIMONIAL_URL', plugin_dir_url( __FILE__ ) );
define( 'RANDOM_TESTIMONIAL_FILE', __FILE__ );

add_action( 'after_setup_theme', 'crb_load' );
/**
 * Loads Carbon Fields.
 *
 * @since 3.0.0
 */
function crb_load() {
	$autoloader = RANDOM_TESTIMONIAL_DIR . 'vendor/autoload.php';
	if ( is_readable( $autoloader ) ) {
		require_once $autoloader;
	}

	\Carbon_Fields\Carbon_Fields::boot();
}

require_once RANDOM_TESTIMONIAL_DIR . 'includes/assets.php';
require_once RANDOM_TESTIMONIAL_DIR . 'includes/customizer.php';
require_once RANDOM_TESTIMONIAL_DIR . 'includes/fields.php';
require_once RANDOM_TESTIMONIAL_DIR . 'includes/post-type.php';
require_once RANDOM_TESTIMONIAL_DIR . 'includes/render.php';
require_once RANDOM_TESTIMONIAL_DIR . 'includes/taxonomy.php';
