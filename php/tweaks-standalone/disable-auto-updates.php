<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nexgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      Disable Contact Form 7 auto paragraph creation
 * Description:      Sets wpcf7_autop_or_not filter to false
 * Plugin URI:       https://nexgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

// Disable core auto-updates
add_filter( 'auto_update_core', '__return_false' );
// Disable auto-updates for plugins.
add_filter( 'auto_update_plugin', '__return_false' );
// Disable auto-updates for themes.
add_filter( 'auto_update_theme', '__return_false' );
