<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

add_filter( 'xmlrpc_enabled', '__return_false' );
