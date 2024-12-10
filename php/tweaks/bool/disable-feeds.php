<?php
/**
 * @package   Nextgenthemes\WPtweak
 * @link      https://nexgenthemes.com
 * @copyright 2024 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      Disable Feeds
 * Description:      Disables RSS, Atom and RDF feeds
 * Plugin URI:       https://nexgenthemes.com/plugins/wp-tweak/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

add_action( 'do_feed_rdf', __NAMESPACE__ . '\kill_feed', 1 );
add_action( 'do_feed_rss', __NAMESPACE__ . '\kill_feed', 1 );
add_action( 'do_feed_rss2', __NAMESPACE__ . '\kill_feed', 1 );
add_action( 'do_feed_atom', __NAMESPACE__ . '\kill_feed', 1 );

function kill_rss(): void {
	wp_die( esc_html__( 'Feeds are disabled.', 'wp-tweak' ) );
}
