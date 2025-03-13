<?php
/**
 * @package   Nextgenthemes\WPtweak
 * @link      https://nexgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      Disable Email Login
 * Description:      Disable Email Login
 * Plugin URI:       https://nexgenthemes.com/plugins/wp-tweak/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 */

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );
