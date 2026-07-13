<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Remove WordPress Events and News Widget
 * Description:      Removes the WordPress Events and News dashboard widget.
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\remove_widget_events_news' );

function remove_widget_events_news(): void {
	remove_meta_box( 'dashboard_primary', 'dashboard', 'side' );
}
