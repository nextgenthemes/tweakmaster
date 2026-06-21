<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Remove Admin Bar Logo
 * Description:      Removes the WordPress logo from the admin bar
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'wp_before_admin_bar_render', __NAMESPACE__ . '\remove_admin_bar_wp_logo', 20 );
function remove_admin_bar_wp_logo(): void {

	global $wp_admin_bar;

	$wp_admin_bar->remove_node( 'wp-logo' );
}
