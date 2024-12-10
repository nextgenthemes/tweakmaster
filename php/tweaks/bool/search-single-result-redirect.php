<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

add_action( 'template_redirect', __NAMESPACE__ . '\single_result' );

function single_result(): void {
	if ( is_search() ) {
		global $wp_query;
		if ( 1 === $wp_query->post_count ) {
			wp_safe_redirect( get_permalink( $wp_query->posts['0']->ID ) );
			exit();
		}
	}
}
