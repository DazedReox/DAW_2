<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit04d51096444f4d36523875cf7f747f44
{
    public static $prefixLengthsPsr4 = array (
        'V' => 
        array (
            'Views\\' => 6,
        ),
        'R' => 
        array (
            'Repositories\\' => 13,
            'Reox\\PHPRecuperacion\\' => 25,
        ),
        'M' => 
        array (
            'Models\\' => 7,
        ),
        'C' => 
        array (
            'Controllers\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Views\\' => 
        array (
            0 => __DIR__ . '/../..' . '/.src/Views',
        ),
        'Reox\\PHPRecuperacion\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
        'Models\\' => 
        array (
            0 => __DIR__ . '/../..' . '/.src/Models',
        ),
        'Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controllers',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit04d51096444f4d36523875cf7f747f44::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit04d51096444f4d36523875cf7f747f44::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit04d51096444f4d36523875cf7f747f44::$classMap;

        }, null, ClassLoader::class);
    }
}
