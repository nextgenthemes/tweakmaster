<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit5aa486b2e15e5a77b655cb1dccf2d827
{
    public static $files = array (
        '47777597fbe681453e41ea4bf4ad9988' => __DIR__ . '/..' . '/nextgenthemes/wp-shared/includes/WP/init.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Automattic\\Jetpack\\Autoloader\\' => 30,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Automattic\\Jetpack\\Autoloader\\' => 
        array (
            0 => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src',
        ),
    );

    public static $classMap = array (
        'Automattic\\Jetpack\\Autoloader\\AutoloadFileWriter' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadFileWriter.php',
        'Automattic\\Jetpack\\Autoloader\\AutoloadGenerator' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadGenerator.php',
        'Automattic\\Jetpack\\Autoloader\\AutoloadProcessor' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/AutoloadProcessor.php',
        'Automattic\\Jetpack\\Autoloader\\CustomAutoloaderPlugin' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/CustomAutoloaderPlugin.php',
        'Automattic\\Jetpack\\Autoloader\\ManifestGenerator' => __DIR__ . '/..' . '/automattic/jetpack-autoloader/src/ManifestGenerator.php',
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit5aa486b2e15e5a77b655cb1dccf2d827::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit5aa486b2e15e5a77b655cb1dccf2d827::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit5aa486b2e15e5a77b655cb1dccf2d827::$classMap;

        }, null, ClassLoader::class);
    }
}
