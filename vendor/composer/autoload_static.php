<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit80e4be69f85996dcb7c4452cd39b354c
{
    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Walber2903\\PdoCourse\\' => 21,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Walber2903\\PdoCourse\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit80e4be69f85996dcb7c4452cd39b354c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit80e4be69f85996dcb7c4452cd39b354c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit80e4be69f85996dcb7c4452cd39b354c::$classMap;

        }, null, ClassLoader::class);
    }
}
