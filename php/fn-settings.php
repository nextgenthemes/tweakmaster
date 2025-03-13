<?php

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

use Nextgenthemes\WP\Settings;
use Nextgenthemes\WP\SettingsData;

function settings_instance(): Settings {

	static $instance = null;

	if ( null === $instance ) {

		$instance = new Settings(
			array(
				'namespace'           => __NAMESPACE__,
				'base_url'            => plugins_url( '', PLUGIN_FILE ),
				'base_path'           => PLUGIN_DIR,
				'plugin_file'         => PLUGIN_FILE,
				'settings'            => settings_data(),
				'menu_title'          => esc_html__( 'WP Tweak', 'wp-tweak' ),
				'settings_page_title' => esc_html__( 'WP Tweak', 'wp-tweak' ),
				'tabs'                => array(
					'general'     => array( 'title' => __( 'General', 'wp-tweak' ) ),
					'privacy'     => array( 'title' => __( 'Privacy', 'wp-tweak' ) ),
					'media'       => array( 'title' => __( 'Media', 'wp-tweak' ) ),
					'revisions'   => array( 'title' => __( 'Revisions', 'wp-tweak' ) ),
					'security'    => array( 'title' => __( 'Security', 'wp-tweak' ) ),
					'performance' => array( 'title' => __( 'Performance', 'wp-tweak' ) ),
					'plugins'     => array( 'title' => __( 'Plugins', 'wp-tweak' ) ),
					'tools'       => array( 'title' => __( 'Tools', 'wp-tweak' ) ),
				),
			)
		);
	}

	return $instance;
}

function options(): array {
	return settings_instance()->get_options();
}

function default_options(): array {
	return settings_instance()->get_options_defaults();
}

function settings_data(): SettingsData {
	$settings = array_merge(
		general_settings(),
		privacy_settings(),
		media_settings(),
		revision_settings(),
		security_settings(),
		performance_settings(),
		plugins_settings(),
		tools_settings()
	);

	return new SettingsData( $settings );
}

function general_settings(): array {
	return array(
		'remove-asset-ver-parameter' => array(
			'tab'         => 'general',
			'label'       => __( 'Remove version query strings', 'wp-tweak' ),
			'description' => __( 'Removes <code>?ver=1.2.3</code> from all styles and scripts.', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-feeds' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable feeds', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-emojis' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable emojis', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'search-single-result-redirect' => array(
			'tab'         => 'general',
			'label'       => __( 'Search single result redirect', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disallow-file-edit' => array(
			'tab'         => 'general',
			'label'       => __( 'Disallow File Edits', 'wp-tweak' ),
			'description' => __( 'Disables the ability to edit files in the file manager. Sets <code>DISALLOW_FILE_EDIT</code> constant to true. Does only work if the constant is already defined, usually in wp-config.php', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'admin-bar-greeting' => array(
			'tab'         => 'general',
			'label'       => __( 'Admin bar greeting', 'wp-tweak' ),
			'description' => __( 'Replace "Howdy, {name}" with a custom message. Use <code>{name}</code> for the user\'s display name. For example <code>Hi, {name}!</code>. Leave empty for no greeting. Use <code>default</code> for the default greeting, preventing the tweak from running.', 'wp-tweak' ),
			'type'        => 'string',
			'default'     => 'default',
		),
		'enable-fonts-to-uploads' => array(
			'tab'         => 'general',
			'label'       => __( 'Enable fonts to uploads', 'wp-tweak' ),
			'description' => __( 'Move (Google) Fonts enabled in the Block Editor from wp-content/fonts to wp-content/uploads', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-auto-trash-emptying' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable auto trash emptying', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'trash-keep-days' => array(
			'tab'         => 'general',
			'label'       => __( 'Set trash keep days', 'wp-tweak' ),
			'description' => __( 'Set the number of days to keep posts in the trash. Default is 30 days.', 'wp-tweak' ),
			'type'        => 'integer',
			'default'     => 30,
		),
		'scroll-progress-bar' => array(
			'tab'         => 'general',
			'label'       => __( 'Scroll progress bar', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'scroll-progress-bar-progress-bg-color' => array(
			'tab'         => 'general',
			'label'       => __( 'Scroll progress color', 'wp-tweak' ),
			'type'        => 'string',
			'description' => sprintf(
				'And valid css will work. You can use <a href="%s" target="_blank">this color picker!</a>.',
				'https://oklch.com'
			),
			'default'     => 'var(--wp--preset--color--primary, oklch(45.44% 0.1924 270 / 78.17%))',
		),
		'scroll-progress-bar-bg-color' => array(
			'tab'         => 'general',
			'label'       => __( 'Scroll progress bar background color', 'wp-tweak' ),
			'type'        => 'string',
			'default'     => 'transparent',
		),
		'scroll-progress-bar-progress-height' => array(
			'tab'         => 'general',
			'label'       => __( 'Scroll progress height', 'wp-tweak' ),
			'type'        => 'string',
			'default'     => '0.4rem',
		),
		'disable-ssl-verify-self' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable self SSL verify', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-auto-updates' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable Auto Updates', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-comments' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable Comments', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-email-login' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable Email Login', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-rest-api' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable REST API', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-success-update-emails' => array(
			'tab'         => 'general',
			'label'       => __( 'Disable Success Update Emails', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'remove-admin-bar-logo' => array(
			'tab'         => 'general',
			'label'       => __( 'Remove Admin Bar Logo', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'remove-asset-attr' => array(
			'tab'         => 'general',
			'label'       => __( 'Remove Asset Attributes', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
	);
}

function security_settings(): array {

	ob_start();
	wp_generator();
	$generator_html = ob_get_clean();

	$remove_wp_version_description = wp_kses(
		sprintf(
			/* translators: %s: example of a "generator" meta tag */
			__( 'Remove <code>%s</code> from html head', 'wp-tweak' ),
			esc_html( $generator_html )
		),
		array(
			'code' => array(),
		)
	);

	return array(
		'disable-xmlrpc' => array(
			'tab'         => 'security',
			'label'       => __( 'Disable XML-RPC', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'disable-xmlrpc-allow-jetpack-ips' => array(
			'tab'         => 'security',
			'label'       => __( 'Disable XML-RPC - allow Jetpack IPs', 'wp-tweak' ),
			'description' => __( 'Allow XML-RPC only from Jetpack IPs', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'remove-wp-version' => array(
			'tab'         => 'security',
			'default'     => false,
			'option'      => true,
			'label'       => __( 'Remove WP version', 'wp-tweak' ),
			'type'        => 'boolean',
			// translators: %s is example html
			'description' => $remove_wp_version_description,
		),
	);
}

function performance_settings(): array {
	return array(
		'dequeue-jquery-migrate' => array(
			'tab'         => 'performance',
			'label'       => __( 'Dequeue jQuery Migrate', 'wp-tweak' ),
			'description' => __( 'Dequeue jQuery Migrate from the jQuery script dependencies on the frontend. This is used to help devs debug from old versions of jQuery. You really do not need this on a production site.', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'enable-script-optimizer' => array(
			'tab'         => 'performance',
			'label'       => __( 'Script Optimizer', 'wp-tweak' ),
			'description' => __( 'Optimize script loading by moving them into the head and adding defer attribute. This may break your site. Use at your own risk!', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
		'enable-relative-urls' => array(
			'tab'         => 'performance',
			'label'       => __( 'Enable relative URLs', 'wp-tweak' ),
			'description' => __( 'Enable relative URLs in the frontend. This may break your site. Use at your own risk!', 'wp-tweak' ),
			'type'        => 'boolean',
			'default'     => false,
		),
	);
}

function media_settings(): array {
	return array(
		'convert-jpeg-to-avif' => array(
			'tab'         => 'media',
			'default'     => false,
			'label'       => __( 'Convert jpeg to avif', 'wp-tweak' ),
			'description' => __( 'Convert uploaded jpeg to avif', 'wp-tweak' ),
			'type'        => 'boolean',
		),
		'enable-clean-upload-filenames' => array(
			'tab'         => 'media',
			'default'     => false,
			'label'       => __( 'Clean upload filenames', 'wp-tweak' ),
			'description' => __( 'Sanitize media filenames to remove non-latin special characters and accents', 'wp-tweak' ),
			'type'        => 'boolean',
		),
		'avif-compression' => array(
			'tab'         => 'media',
			'default'     => 82,
			'label'       => __( 'Avif compression', 'wp-tweak' ),
			'type'        => 'integer',
			'description' => __( 'Default is 82', 'wp-tweak' ),
		),
		'jpeg-compression' => array(
			'tab'         => 'media',
			'default'     => 82,
			'label'       => __( 'Jpeg compression', 'wp-tweak' ),
			'description' => __( 'Default is 82', 'wp-tweak' ),
			'type'        => 'integer',
		),
		'webp-compression' => array(
			'tab'         => 'media',
			'default'     => 86,
			'label'       => __( 'Webp compression', 'wp-tweak' ),
			'description' => __( 'Default is 86', 'wp-tweak' ),
			'type'        => 'integer',
		),
	);
}

function privacy_settings(): array {

	// https://github.com/WordPress/WordPress/blob/c10dbc8434d14371366e413e510cb0d54b4f367b/wp-includes/class-wp-http.php#L206
	$default_user_agent     = 'WordPress/' . get_bloginfo( 'version' ) . '; ' . get_bloginfo( 'url' );
	$chrome_user_agent      = 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_15_7) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/131.0.0.0 Safari/537.36';
	$user_agent_description = wp_kses(
		sprintf(
			// translators: %1$s: Default user agent. %2$s: Chrome user agent.
			__( 'WP really hates privacy and sends this <code>%1$s</code> to every site it makes calls to. You can empty the field, pretend to be Chrome <code>%2$s</code> or something else. <code>default</code> will change nothing.', 'wp-tweak' ),
			esc_html( $default_user_agent ),
			esc_html( $chrome_user_agent )
		),
		array(
			'code' => array(),
		)
	);

	return array(
		'user-agent' => array(
			'tab'         => 'privacy',
			'default'     => 'default',
			'option'      => true,
			'label'       => __( 'Set user agent', 'wp-tweak' ),
			'type'        => 'string',
			'description' => $user_agent_description,
		),

		'remove-exif' => array(
			'tab'         => 'privacy',
			'default'     => false,
			'option'      => true,
			'label'       => __( 'Remove EXIF', 'wp-tweak' ),
			'description' => __( 'Remove EXIF data from uploaded images.', 'wp-tweak' ),
			'type'        => 'boolean',
		),
	);
}

function plugins_settings(): array {

	return array(
		'disable-cf7-css' => array(
			'tab'         => 'plugins',
			'default'     => false,
			'option'      => true,
			'label'       => __( 'Disable Contact Form 7 CSS', 'wp-tweak' ),
			'description' => __( 'Sets <code>wpcf7_load_css</code> filter to false', 'wp-tweak' ),
			'type'        => 'boolean',
		),
		'disable-cf7-autop' => array(
			'tab'         => 'plugins',
			'default'     => false,
			'option'      => true,
			'label'       => __( 'Disable Contact Form 7 Autop', 'wp-tweak' ),
			'description' => __( 'Sets <code>wpcf7_autop_or_not</code> filter to false', 'wp-tweak' ),
			'type'        => 'boolean',
		),
		'enable-jetpack-offline-mode' => array(
			'tab'         => 'plugins',
			'default'     => false,
			'option'      => true,
			'label'       => __( 'Enable Jetpack offline mode', 'wp-tweak' ),
			'type'        => 'boolean',
		),
	);
}

function revision_settings(): array {

	$settings = array();

	foreach ( get_revision_post_types() as $type => $name ) {
		$settings[ 'revisions-limit-' . $type ] = array(
			'tab'         => 'revisions',
			'default'     => -1,
			'option'      => true,
			// translators: %s is post type name
			'label'       => sprintf( __( 'Revisions for %s', 'wp-tweak' ), $name ),
			'type'        => 'integer',
		);
	}

	$settings['revisions-limit-all'] = array(
		'tab'         => 'revisions',
		'default'     => -1,
		'option'      => true,
		'label'       => __( 'Limit ALL revisions', 'wp-tweak' ),
		'description' => __( 'Limit revisions for all post types. This will override the limit for each post type from above!', 'wp-tweak' ),
		'type'        => 'integer',
	);

	return $settings;
}

function tools_settings(): array {

	return array(
		'enable-maintenance-mode' => array(
			'tab'         => 'tools',
			'default'     => false,
			'label'       => __( 'Enable maintenance mode', 'wp-tweak' ),
			'type'        => 'boolean',
		),
		'enable-duplicate-post' => array(
			'tab'         => 'tools',
			'default'     => false,
			'label'       => __( 'Enable duplicate post', 'wp-tweak' ),
			'type'        => 'boolean',
		),
	);
}

function option_is_set( string $key ): bool {

	$default_option = default_options()[ $key ];

	return options()[ $key ] !== $default_option;
}

function any_option_is_set( array $options_keys ): bool {

	foreach ( $options_keys as $key ) {
		if ( option_is_set( $key ) ) {
			return true;
		}
	}

	return false;
}

/**
 * Get post types which support revisions.
 */
function get_revision_post_types(): array {

	$revision_post_types = [];

	foreach ( get_post_types() as $type ) {

		$object = get_post_type_object( $type );

		if ( ! post_type_supports( $type, 'revisions' ) || null === $object ) {
			continue;
		}

		$name = ( property_exists( $object, 'labels' ) && property_exists( $object->labels, 'name' ) )
			? $object->labels->name
			: $object->name;

		$revision_post_types[ $type ] = $name;
	}

	return $revision_post_types;
}
