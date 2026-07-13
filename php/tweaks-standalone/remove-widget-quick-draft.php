<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Remove Quick Draft Widget
 * Description:      Removes the Quick Draft dashboard widget.
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'wp_dashboard_setup', __NAMESPACE__ . '\remove_widget_quick_draft' );

function remove_widget_quick_draft(): void {
	remove_meta_box( 'dashboard_quick_press', 'dashboard', 'side' );
}
