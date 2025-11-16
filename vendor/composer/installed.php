<?php return array(
    'root' => array(
        'name' => 'nextgenthemes/tweakmaster',
        'pretty_version' => 'dev-master',
        'version' => 'dev-master',
        'reference' => '87d39693e534411459a277643edde15c6b661a42',
        'type' => 'wordpress-plugin',
        'install_path' => __DIR__ . '/../../',
        'aliases' => array(),
        'dev' => true,
    ),
    'versions' => array(
        'automattic/jetpack-autoloader' => array(
            'pretty_version' => 'v5.0.11',
            'version' => '5.0.11.0',
            'reference' => '90bf7b3bc29cb7be74105ac99afab4c21bc47e29',
            'type' => 'composer-plugin',
            'install_path' => __DIR__ . '/../automattic/jetpack-autoloader',
            'aliases' => array(),
            'dev_requirement' => true,
        ),
        'nextgenthemes/tweakmaster' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => '87d39693e534411459a277643edde15c6b661a42',
            'type' => 'wordpress-plugin',
            'install_path' => __DIR__ . '/../../',
            'aliases' => array(),
            'dev_requirement' => false,
        ),
        'nextgenthemes/wp-settings' => array(
            'pretty_version' => 'dev-master',
            'version' => 'dev-master',
            'reference' => 'c899134604cca1d2cbea92ccebc8acdb2eb84429',
            'type' => 'library',
            'install_path' => __DIR__ . '/../nextgenthemes/wp-settings',
            'aliases' => array(
                0 => '9999999-dev',
            ),
            'dev_requirement' => true,
        ),
    ),
);
