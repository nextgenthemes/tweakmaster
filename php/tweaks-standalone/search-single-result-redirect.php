<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:     Single Search Result Redirect
 * Description:     Redirects to the single search result if there is only one result.
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Author:          Nicolas Jonas
 * Author URI:      https://nextgenthemes.com
 * Version:         1.0.0
 * License:         GPL-3.0-only
 * License URI:     https://www.gnu.org/licenses/gpl-3.0.html
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'template_redirect', __NAMESPACE__ . '\single_result' );

function single_result(): void {
	if ( is_search() ) {
		global $wp_query;
		if ( 1 === $wp_query->post_count ) {
			wp_safe_redirect( get_permalink( $wp_query->posts['0']->ID ) );
			exit();
		}
	}
}
