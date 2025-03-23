<?php return array(
    'root' => array(
        'name' => 'nextgenthemes/tweakmaster',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '82cecbf0b2236458018b133c84e019d44400b656',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'automattic/jetpack-autoloader' => array(
            'pretty_version' => 'v5.0.5',
            'version' => '5.0.5.0',
            'reference' => '7bf3172e73c27c72d01d6de4796a41c7abc06d5a',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../automattic/jetpack-autoloader',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'nextgenthemes/tweakmaster' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '82cecbf0b2236458018b133c84e019d44400b656',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'nextgenthemes/wp-settings' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '8570f0355e41c34591139b5b891b62617e4f444b',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nextgenthemes/wp-settings',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
    ),
);
