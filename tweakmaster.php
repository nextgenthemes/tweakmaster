<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nexgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:       Tweak Master
 * Description:       A collection or performance, privacy, security and other tweaks.. Minimalistic lightweight plugin.
 * Plugin URI:        https://nexgenthemes.com/plugins/tweakmaster/
 * Version:           1.0.0-beta2
 * Requires at least: 6.6
 * Author:            Nicolas Jonas
 * Author URI:        https://nexgenthemes.com
 * License:           GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const VERSION       = '1.0.0-beta2';
const PLUGIN_FILE   = __FILE__;
const PLUGIN_DIR    = __DIR__;
const TWEAKS_DIR    = __DIR__ . '/php/tweaks';
const TWEAKS_DIR_SA = __DIR__ . '/php/tweaks-standalone';

require_once __DIR__ . '/vendor/autoload_packages.php';
require_once __DIR__ . '/php/init.php';
