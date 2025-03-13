<?php

declare(strict_types = 1);

namespace Nextgenthemes\TweakMaster;

use WP_UnitTestCase;

class Tests_XMLRPC extends WP_UnitTestCase {

	public function test_jetpack_ips_transient() {

		require_once TWEAKS_DIR_SA . '/disable-xmlrpc-allow-jetpack-ips.php';

		get_jetpack_ips();

		$this->assertContains( '122.248.245.244/32',get_transient('wp_tweak_jetpack_ips') );
		$this->assertContains( '54.217.201.243/32', get_transient('wp_tweak_jetpack_ips') );
		$this->assertContains( '54.232.116.4/32', get_transient('wp_tweak_jetpack_ips') );
		$this->assertContains( '192.0.80.0/20', get_transient('wp_tweak_jetpack_ips') );
	}
}
