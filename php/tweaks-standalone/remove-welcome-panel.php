<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Remove Welcome Panel
 * Description:      Removes the Welcome Panel from the dashboard.
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\remove_welcome_panel' );

function remove_welcome_panel(): void {
	remove_action( 'welcome_panel', 'wp_welcome_panel' );
}
