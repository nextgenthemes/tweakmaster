<?php
/**
 * @package   Nextgenthemes\WPtweak
 * @link      https://nexgenthemes.com
 * @copyright 2024 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      Disable Contact Form 7 CSS
 * Description:      Sets wpcf7_load_css filter to false
 * Plugin URI:       https://nexgenthemes.com/plugins/wp-tweak/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

add_action( 'init', __NAMESPACE__ . '\disable_auto_trash_emptying');

function disable_auto_trash_emptying(): void {
	remove_action( 'wp_scheduled_delete', 'wp_scheduled_delete' );
}
