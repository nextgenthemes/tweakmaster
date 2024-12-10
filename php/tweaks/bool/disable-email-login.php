<?php

declare(strict_types = 1);

namespace Nextgenthemes\WPtweak;

remove_filter( 'authenticate', 'wp_authenticate_email_password', 20 );
