<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Remove wlwmanifest Link
 * Description:      Removes Windows Live Writer manifest link tag from the head
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

remove_action( 'wp_head', 'wlwmanifest_link' );
