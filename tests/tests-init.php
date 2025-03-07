<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

use WP_UnitTestCase;
use Nextgenthemes\WP\SettingValidator;

class Tests_Init extends WP_UnitTestCase {

	public function data_setting_keys_from_files(): array {

		$files = glob( TWEAKS_DIR_SA . '/*.php' );

		foreach ( $files as $file ) {

			$key      = str_replace( '.php', '', basename( $file ) );
			$output[] = [ 'key' => $key ];
		}

		return $output;
	}
	/**
	 * @dataProvider data_setting_keys_from_files
	 */
	public function test_standalone_files_have_settings( string $key ): void {

		$setting = settings_data()->get( $key );

		$this->assertInstanceOf( SettingValidator::class, $setting );
		$this->assertIsBool( $setting->default );
		$this->assertEquals( 'boolean', $setting->type );
	}

	public function data_standalone_setting_keys(): array {

		$settings = settings_data();
		$settings->remove( 'scroll-progress-bar' ); // uses options api

		foreach ( $settings->get_all() as $key => $setting ) {

			if ( 'boolean' !== $setting->type ) {
				continue;
			}

			$output[] = [ 'key' => $key ];
		}

		return $output;
	}
	/**
	 * @dataProvider data_standalone_setting_keys
	 */
	public function test_has_standalone_file_for_setting( string $key ): void {
		$this->assertTrue( file_exists( TWEAKS_DIR_SA . "/$key.php" ) );
	}
}
