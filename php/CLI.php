<?php

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

use WP_CLI;
use WP_CLI_Command;

class CLI extends WP_CLI_Command {

	/**
	 * Outputs a markdown list of all tweaks with labels and descriptions.
	 *
	 * @when after_wp_load
	 *
	 * @param array<string,mixed> $args
	 * @param array<string,mixed> $assoc_args
	 */
	public function feature_list( array $args, array $assoc_args ): void {
		$settings = settings_data()->get_all();

		foreach ( $settings as $key => $setting ) {
			$line = '* **' . $setting->label . '**';

			if ( ! empty( $setting->description ) ) {
				$line .= '<br>' . PHP_EOL . $setting->description;
			}

			WP_CLI::line( $line );
		}
	}
}
