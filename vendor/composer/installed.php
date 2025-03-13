<?php return array(
    'root' => array(
        'name' => 'nextgenthemes/tweakmaster',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '28b5f920a601843a646cca46b2b85e2290d7abad',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'automattic/jetpack-autoloader' => array(
            'pretty_version' => 'v5.0.3',
            'version' => '5.0.3.0',
            'reference' => '108cc708cfc7b7a0e730b2bf12f389593f56f0a5',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../automattic/jetpack-autoloader',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'nextgenthemes/tweakmaster' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '28b5f920a601843a646cca46b2b85e2290d7abad',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'nextgenthemes/wp-settings' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'df8a66ad3101216fbe058bc882208b30ad4e5f93',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nextgenthemes/wp-settings',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => false,
        ),
    ),
);
