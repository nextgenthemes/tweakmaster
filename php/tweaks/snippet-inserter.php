<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nexgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'wp_head', __NAMESPACE__ . '\output_global_header_snippet' );
add_action( 'wp_footer', __NAMESPACE__ . '\output_global_footer_snippet' );
add_action( 'wp_body_open', __NAMESPACE__ . '\output_global_body_snippet' );
add_filter( 'the_content', __NAMESPACE__ . '\output_global_content_prepend_snippet' );
add_filter( 'the_content', __NAMESPACE__ . '\output_global_content_append_snippet' );

/**
 * Get the content of a global snippet setting, or empty string.
 *
 * Applies all guards: global snippets filter, admin/feed/robots/trackback
 * check, and empty/whitespace check.
 *
 * @param string $setting_key The tweakmaster setting key.
 */
function get_global_snippet_content( string $setting_key ): string {

	if ( ! apply_filters( 'tweakmaster_global_snippets', true ) ) {
		return '';
	}

	$code = options()[ $setting_key ];

	if ( empty( $code ) || empty( trim( $code ) ) ) {
		return '';
	}

	// Ignore admin, feed, robots or trackbacks.
	if ( is_admin() || is_feed() || is_robots() || is_trackback() ) {
		return '';
	}

	return wp_unslash( $code ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Output the global header snippet.
 *
 */
function output_global_header_snippet(): void {

	$code = get_global_snippet_content( 'global-header-snippet' );

	if ( ! empty( $code ) ) {
		echo $code;
	}
}

/**
 * Output the global footer snippet.
 *
 */
function output_global_footer_snippet(): void {

	$code = get_global_snippet_content( 'global-footer-snippet' );

	if ( ! empty( $code ) ) {
		echo $code;
	}
}

/**
 * Output the global body snippet.
 *
 */
function output_global_body_snippet(): void {

	$code = get_global_snippet_content( 'global-body-snippet' );

	if ( ! empty( $code ) ) {
		echo $code;
	}
}

/**
 * Output the global content prepend snippet.
 *
 */
function output_global_content_prepend_snippet( string $content ): string {

	$code = get_global_snippet_content( 'content-prepend-snippet' );

	if ( ! empty( $code ) ) {
		return $code . $content;
	}

	return $content;
}

/**
 * Output the global content append snippet.
 *
 */
function output_global_content_append_snippet( string $content ): string {

	$code = get_global_snippet_content( 'content-append-snippet' );

	if ( ! empty( $code ) ) {
		return $content . $code;
	}

	return $content;
}

/**
 * Output a global snippet via the specified setting key.
 *
 * Replicates insert-headers-and-footers' wpcode_global_script_output()
 * and update_option() save behavior (no sanitization on save).
 *
 * @param string $setting_key The tweakmaster setting key.
 * @deprecated Use get_global_snippet_content() instead.
 */
function output_global_snippet( string $setting_key ): void {

	$code = get_global_snippet_content( $setting_key );

	if ( ! empty( $code ) ) {
		echo $code;
	}
}
