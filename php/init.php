<?php

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

add_action( 'plugins_loaded', __NAMESPACE__ . '\init_public' );
add_action( 'plugins_loaded', __NAMESPACE__ . '\init_admin' );

function init_public(): void {

	require_once __DIR__ . '/fn-settings.php';

	$settings = settings_data();
	$settings->remove( 'scroll-progress-bar' ); // uses options api

	foreach ( $settings->get_all() as $key => $setting ) {

		if ( 'boolean' === $setting->type && option_is_set( $key ) ) {
			require_once TWEAKS_DIR_SA . "/$key.php";
		}
	}

	if ( any_option_is_set( [ 'jpeg-compression', 'webp-compression', 'avif-compression' ] ) ) {
		require_once TWEAKS_DIR . '/image-quality.php';
	}

	if ( ! defined( 'EMPTY_TRASH_DAYS' ) && option_is_set( 'trash-keep-days' ) ) {
		require_once TWEAKS_DIR . '/set-trash-keep-days.php';
	}

	require_once TWEAKS_DIR . '/revisions-to-keep.php';

	require_file_if_option_is_set( 'admin-bar-greeting' );
	require_file_if_option_is_set( 'scroll-progress-bar' );
	require_file_if_option_is_set( 'user-agent' );
}

function require_file_if_option_is_set( string $key ): void {

	if ( option_is_set( $key ) ) {
		require_once TWEAKS_DIR . "/$key.php";
	}
}

function init_admin(): void {
	add_action( 'nextgenthemes/tweakmaster/admin/settings/content', __NAMESPACE__ . '\revisions_tab_info' );
}

function revisions_tab_info(): void {

	?>
	<div data-wp-bind--hidden="!context.activeTabs.revisions">
		<p>
			<?php echo wp_kses( __( '<code>-1</code> = Unlimited revisions', 'tweakmaster' ), [ 'code' => [] ] ); ?><br>
			<?php echo wp_kses( __( '<code>0</code> = Disable revisions', 'tweakmaster' ), [ 'code' => [] ] ); ?><br>
			<?php echo wp_kses( __( 'Positive integer = Number of revisions', 'tweakmaster' ), [ 'code' => [] ] ); ?>
		</p>
	</div>
	<?php
}
