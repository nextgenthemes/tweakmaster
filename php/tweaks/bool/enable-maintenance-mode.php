<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

const CAPABILITY = 'delete_plugins';

add_action( 'init', __NAMESPACE__ . '\init' );
add_action( 'admin_bar_menu', __NAMESPACE__ . '\add_maintenance_mode_notice', 100 );
add_filter( 'login_message', __NAMESPACE__ . '\login_message' );
add_action( 'wp_authenticate_user', __NAMESPACE__ . '\check_user_capability' );

function check_user_capability( \WP_User $user ): \WP_User {

	if ( ! $user || ! user_can( $user, CAPABILITY ) ) {

		// Deny the user
		wp_clear_auth_cookie();
		wp_set_auth_cookie( '', false );
		do_action( 'wp_logout' );
		wp_safe_redirect( wp_login_url() );
		exit;
	}

	return $user;
}

function ngt_user_can( \WP_User $user, string $capability ): bool {

	if ( ! capability_exists( $capability ) ) {
		wp_die( sprintf( 'Capability %s does not exist', esc_html( "'$capability'" ) ) );
	}

	return user_can( $user, $capability );
}

function capability_exists( string $capability ): bool {
	global $wp_roles;
	$capabilities = array();
	foreach ( $wp_roles->roles as $role ) {
		foreach ( $role['capabilities'] as $cap => $value ) {
			$capabilities[] = $cap;
		}
	}

	if ( in_array( $capability, $capabilities, true ) ) {
		return true;
	}

	return false;
}


function init(): void {

	if ( ! current_user_can( 'delete_plugins' ) && ! is_admin() && ! is_login() && ! is_wp_cli() ) {
		wp_die(
			wp_kses(
				sprintf(
					// Translators: URL
					__('Site is currently under maintenance. Please check back later. <a href="%s">Login</a>', 'wp-tweak'),
					esc_url( wp_login_url() )
				),
				array(
					'a' => array(
						'href' => true,
					),
				),
				array( 'http', 'https' )
			)
		);
	}
}

/**
 * Adds a node to the admin bar indicating that the site is in maintenance mode.
 *
 * This is only shown to users who are not logged in or do not have the manage_options capability.
 *
 * @param WP_Admin_Bar $wp_admin_bar The admin bar object.
 */
function add_maintenance_mode_notice( \WP_Admin_Bar $wp_admin_bar ): void {

	$wp_admin_bar->add_node(
		array(
			'id'     => 'maintenance_mode',
			'title'  => sprintf(
				'<a style="color: red; font-weight: bold;" href="%s">%s</a>',
				esc_url( admin_url( 'options-general.php?page=nextgenthemes_wptweak' ) ),
				__( 'MAINTENANCE MODE ACTIVE', 'wp-tweak' )
			),
			'meta'   => array(
				'html'  => true,
				'class' => 'maintenance-mode',
			),
			'parent' => false,
		)
	);
}

function is_wp_cli(): bool {
	return defined( 'WP_CLI' ) && \WP_CLI;
}

function login_message( string $message ): string {

	$message .= maintenance_mode_message();

	return $message;
}

function maintenance_mode_message(): string {

	return sprintf(
		'<h2 style="%s">
			<strong>%s</strong>
		</h2>
		<p style="font-size: 1.2em;">
			%s
		</p>',
		'color: red; text-align: center; margin-bottom: .7em;',
		esc_html__( 'Maintenance Mode Active!', 'wp-tweak' ),
		sprintf(
			// Translators: %1$s: user capability (delete_plugins).
			esc_html__( 'Only users who can %s (typically administrators) are allowed to login to this WordPress installation.', 'wp-tweak' ),
			'<code>' . esc_html( CAPABILITY ) . '</code>'
		)
	);
}
