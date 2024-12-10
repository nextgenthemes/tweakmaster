<?php
/**
 * @package   Nextgenthemes\WPtweak
 * @link      https://nexgenthemes.com
 * @copyright 2024 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      WP Tweak
 * Description:      A collection or performance, privacy, security and other tweaks.. Minimalistic lightweight plugin.
 * Plugin URI:       https://nexgenthemes.com/plugins/wp-tweak/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

const VERSION     = '0.0.1';
const PLUGIN_FILE = __FILE__;
const PLUGIN_DIR  = __DIR__;
const TWEAKS_DIR  = __DIR__ . '/php/tweaks';
// For error messages and stuff on the admin screens.
const ALLOWED_HTML = array(
	'h1'     => array(),
	'h2'     => array(),
	'h3'     => array(),
	'h4'     => array(),
	'h5'     => array(),
	'h6'     => array(),
	'a'      => array(
		'href'   => true,
		'target' => true,
		'title'  => true,
	),
	'abbr'   => array( 'title' => true ),
	'p'      => array(),
	'br'     => array(),
	'em'     => array(),
	'strong' => array(),
	'code'   => array(),
	'ul'     => array(),
	'li'     => array(),
	'pre'    => array(),
	'div'    => array( 'class' => true ),
);

require_once __DIR__ . '/vendor/autoload_packages.php';
require_once __DIR__ . '/php/init.php';
