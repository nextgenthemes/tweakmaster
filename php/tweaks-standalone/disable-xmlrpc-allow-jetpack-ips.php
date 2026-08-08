<?php
/**
 * @package   Nextgenthemes\TweakMaster
 * @link      https://nextgenthemes.com
 * @copyright 2025 Nicolas Jonas
 * @license   GPL-3.0-only
 *
 * @wordpress-plugin
 * Plugin Name:      Disable XML-RPC - allow Jetpack IPs
 * Description:      Disable XML-RPC but allow it for Jetpack IPs
 * Plugin URI:       https://nextgenthemes.com/plugins/tweakmaster/
 * Version:          1.0.0
 * Author:           Nicolas Jonas
 * Author URI:       https://nextgenthemes.com
 * License:          GPL-3.0-only
 * Requires at least: 6.6
 * Requires PHP:      7.4
 */

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

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
	$bits                = (int) $bits;
	$ip                  = ip2long( $ip );
	$subnet              = ip2long( $subnet );
	$mask                = -1 << ( 32 - $bits );
	$subnet             &= $mask; // Sanitize subnet
	return ( $ip & $mask ) === $subnet;
}

// Check if the current request is from a Jetpack IP
function is_jetpack_ip(): bool {

	if ( empty( $_SERVER['REMOTE_ADDR'] ) ) {
		$client_ip = '0.0.0.0';
	} else {
		$client_ip = sanitize_text_field( wp_unslash( $_SERVER['REMOTE_ADDR'] ) );
	}

	if ( ! empty( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) {
		// HTTP_X_FORWARDED_FOR can contain a comma-separated list; take the first IP
		$forwarded_ips = explode( ',', sanitize_text_field( wp_unslash( $_SERVER['HTTP_X_FORWARDED_FOR'] ) ) );
		$client_ip     = trim( $forwarded_ips[0] ); // First IP is typically the original client
	}

	if ( ! is_valid_ip( $client_ip ) ) {
		wp_trigger_error( __FUNCTION__, 'Invalid Client IP: ' . $client_ip );
		return false;
	}

	foreach ( JETPACK_IPS as $range ) {
		if ( is_ip_in_range( $client_ip, $range ) ) {
			return true;
		}
	}
	return false;
}

function is_valid_ip( string $ip ): bool {
	return filter_var( $ip, FILTER_VALIDATE_IP ) !== false;
}
