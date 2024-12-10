<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

use WP_Error;
use Nextgenthemes\WP\Settings;

class Base {
	private static $instance = null;
	private Settings $settings_instance;
	private \WP_Error $errors;

	public function __construct() {
		$this->errors            = new \WP_Error();
		$this->settings_instance = new Settings(
			array(
				'namespace'           => __NAMESPACE__,
				'base_url'            => plugins_url( '', PLUGIN_FILE ),
				'base_path'           => PLUGIN_DIR,
				'plugin_file'         => PLUGIN_FILE,
				'settings'            => settings_data(),
				'menu_title'          => esc_html__( 'WP Tweak', 'wp-tweak' ),
				'settings_page_title' => esc_html__( 'WP Tweak', 'wp-tweak' ),
				'sections'            => array(
					'general'     => __( 'General', 'wp-tweak' ),
					'privacy'     => __( 'Privacy', 'wp-tweak' ),
					'media'       => __( 'Media', 'wp-tweak' ),
					'revisions'   => __( 'Revisions', 'wp-tweak' ),
					'security'    => __( 'Security', 'wp-tweak' ),
					'performance' => __( 'Performance', 'wp-tweak' ),
					'plugins'     => __( 'Plugins', 'wp-tweak' ),
					'tools'       => __( 'Tools', 'wp-tweak' ),
				),
			)
		);
	}

	public function get_settings_instance(): Settings {
		return $this->settings_instance;
	}

	public function get_errors(): \WP_Error {
		return $this->errors;
	}

	public static function get_instance(): Base {

		if ( null === self::$instance ) {
			self::$instance = new Base();
		}

		return self::$instance;
	}
}
