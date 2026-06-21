<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Disable Auto Updates
 * Description:      Disables core, plugin, and theme auto-updates
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

// Disable core auto-updates
add_filter( 'auto_update_core', '__return_false' );
// Disable auto-updates for plugins.
add_filter( 'auto_update_plugin', '__return_false' );
// Disable auto-updates for themes.
add_filter( 'auto_update_theme', '__return_false' );
