<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit01a6c0b0c9de99986bcd10c8ce596b76
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MF\\' => 3,
        ),
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MF\\' => 
        array (
            0 => __DIR__ . '/..' . '/MF',
        ),
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/App',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit01a6c0b0c9de99986bcd10c8ce596b76::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit01a6c0b0c9de99986bcd10c8ce596b76::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit01a6c0b0c9de99986bcd10c8ce596b76::$classMap;

        }, null, ClassLoader::class);
    }
}
