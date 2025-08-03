<?php return array(
    'root' => array(
        'name' => 'nextgenthemes/tweakmaster',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '3ac9ff7706b79740c773412a3546f0590e056e29',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'automattic/jetpack-autoloader' => array(
            'pretty_version' => 'v5.0.9',
            'version' => '5.0.9.0',
            'reference' => 'c9e9b82cc515d9ed093fa0ff21245f277aeceb4e',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../automattic/jetpack-autoloader',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'nextgenthemes/tweakmaster' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '3ac9ff7706b79740c773412a3546f0590e056e29',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'nextgenthemes/wp-settings' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '4e26cd875e2ba18f6f1bb523ef51d01ec7f7869d',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nextgenthemes/wp-settings',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
    ),
);
