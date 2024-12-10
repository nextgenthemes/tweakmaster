<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

add_action( 'plugins_loaded', __NAMESPACE__ . '\init_public' );
add_action( 'plugins_loaded', __NAMESPACE__ . '\init_admin' );

function init_public(): void {

	require_once __DIR__ . '/Base.php';
	require_once __DIR__ . '/fn-settings.php';

	$settings = settings_data();
	unset( $settings['scroll-progress-bar'] ); // uses options api

	foreach ( $settings as $key => $setting ) {

		$tweak_file = 'boolean' === $setting['type']
			? TWEAKS_DIR . "/bool/$key.php"
			: TWEAKS_DIR . "/$key.php";

		if ( defined( 'WP_DEBUG' ) && WP_DEBUG
			&& ! file_exists( $tweak_file )
			&& 'boolean' === $setting['type']
		) {
			wp_trigger_error( __FUNCTION__, 'Tweak file not found: ' . $tweak_file );
		}

		if ( 'boolean' === $setting['type'] && option_is_set( $key ) ) {
			require_once $tweak_file;
		}
	}

	if ( any_option_is_set( [ 'jpeg-compression', 'webp-compression', 'avif-compression' ] ) ) {
		require_once TWEAKS_DIR . '/image-quality.php';
	}

	if ( option_is_set( 'admin-bar-greeting' ) ) {
		require_once TWEAKS_DIR . '/set-admin-bar-greeting.php';
	}

	if ( ! defined( 'EMPTY_TRASH_DAYS' ) && option_is_set( 'trash-keep-days' ) ) {
		require_once TWEAKS_DIR . '/set-trash-keep-days.php';
	}

	if ( option_is_set( 'scroll-progress-bar' ) ) {
		require_once TWEAKS_DIR . '/scroll-progress-bar.php';
	}

	require_once TWEAKS_DIR . '/revisions-to-keep.php';
}

function init_admin(): void {
	add_action( 'nextgenthemes/wptweak/admin/settings/content', __NAMESPACE__ . '\revisions_tab_info' );
}

function revisions_tab_info(): void {

	?>
	<div data-wp-bind--hidden="!context.activeTabs.revisions">
		<p>
			<?php esc_html_e( '-1 = Unlimited revisions', 'advanced-responsive-video-embedder' ); ?><br>
			<?php esc_html_e( '0 = Disable revisions', 'advanced-responsive-video-embedder' ); ?><br>
			<?php esc_html_e( 'Positive integer = Number of revisions', 'advanced-responsive-video-embedder' ); ?>
		</p>
	</div>
	<?php
}
