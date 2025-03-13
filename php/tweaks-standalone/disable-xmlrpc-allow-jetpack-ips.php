<?php
/**
 * @package   Nextgenthemes\WPtweak
 * @link      https://nexgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0
 *
 * @wordpress-plugin
 * Plugin Name:      Disable XML-RPC - allow Jetpack IPs
 * Description:      Disable XML-RPC but allow it for Jetpack IPs
 * Plugin URI:       https://nexgenthemes.com/plugins/wp-tweak/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nexgenthemes.com
 * License:          GPLv3
 * Requires at least: 6.6
 * Requires PHP:      7.4
 */

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

const JETPACK_IPS = array(
	'122.248.245.244/32',
	'54.217.201.243/32',
	'54.232.116.4/32',
	'192.0.80.0/20',
	'192.0.96.0/20',
	'192.0.112.0/20',
	'195.234.108.0/22',
	'192.0.64.0/18',
);

// Register the filter using the namespace
add_filter( 'xmlrpc_enabled', __NAMESPACE__ . '\filter_xmlrpc_enabled' );

// Filter to enable/disable XML-RPC based on Jetpack IP
function filter_xmlrpc_enabled(): bool {
	if ( is_jetpack_ip() ) {
		return true; // Allow XML-RPC for Jetpack IPs
	}
	return false; // Disable XML-RPC for all others
}

// Function to check if an IP is in a CIDR range
function is_ip_in_range( string $ip, string $cidr ): bool {
	list($subnet, $bits) = explode( '/', $cidr );
	$ip                  = ip2long( $ip );
	$subnet              = ip2long( $subnet );
	$mask                = -1 << ( 32 - $bits );
	$subnet             &= $mask; // Sanitize subnet
	return ( $ip & $mask ) === $subnet;
}

// Fetch and cache Jetpack IP ranges
function get_jetpack_ips(): array {
	$transient_key = 'wp_tweak_jetpack_ips';
	$ips           = get_transient( $transient_key );

	if ( false === $ips ) {
		$response = wp_safe_remote_get( 'https://jetpack.com/ips-v4.txt' );

		if ( is_wp_error( $response ) ) {
			wp_trigger_error( __FUNCTION__, $response->get_error_message() );
			$ips = JETPACK_IPS;
		} elseif ( 200 === wp_remote_retrieve_response_code( $response ) ) {
			$ips = explode( "\n", trim( wp_remote_retrieve_body( $response ) ) );
			$ips = array_filter( $ips ); // Remove empty lines
			set_transient( $transient_key, $ips, WEEK_IN_SECONDS ); // Cache for 1 week
		} else {
			$ips = JETPACK_IPS;
		}
	}
	return $ips;
}

// Check if the current request is from a Jetpack IP
function is_jetpack_ip(): bool {
	$client_ip      = $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
	$jetpack_ranges = get_jetpack_ips();

	if ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		// HTTP_X_FORWARDED_FOR can contain a comma-separated list; take the first IP
		$forwarded_ips = explode( ',', $_SERVER['HTTP_X_FORWARDED_FOR'] );
		$client_ip     = trim( $forwarded_ips[0] ); // First IP is typically the original client
	}

	foreach ( $jetpack_ranges as $range ) {
		if ( is_ip_in_range( $client_ip, $range ) ) {
			return true;
		}
	}
	return false;
}
