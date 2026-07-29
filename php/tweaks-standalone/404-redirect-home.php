<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:     404 Redirect Home
 * Description:     Redirects 404 pages to the homepage.
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Author:          Nicolas Jonas
 * Author URI:      https://nextgenthemes.com
 * Version:         1.0.0
 * License:         GPL-3.0-only
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'template_redirect', __NAMESPACE__ . '\redirect_404_to_home' );

function redirect_404_to_home(): void {
	if ( is_404() ) {
		wp_safe_redirect( home_url() );
		exit();
	}
}
