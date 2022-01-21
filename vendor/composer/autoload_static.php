<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c31729c578698860cf0bd8cc3c68ac3
{
    public static $prefixLengthsPsr4 = array (
        'H' => 
        array (
            'Haseeb\\Session\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Haseeb\\Session\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c31729c578698860cf0bd8cc3c68ac3::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c31729c578698860cf0bd8cc3c68ac3::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c31729c578698860cf0bd8cc3c68ac3::$classMap;

        }, null, ClassLoader::class);
    }
}
