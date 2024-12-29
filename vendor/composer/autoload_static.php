<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit64c841b4a26db32ce230383174359ace
{
    public static $prefixLengthsPsr4 = array (
        'M' => 
        array (
            'MyApp\\' => 6,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'MyApp\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit64c841b4a26db32ce230383174359ace::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit64c841b4a26db32ce230383174359ace::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit64c841b4a26db32ce230383174359ace::$classMap;

        }, null, ClassLoader::class);
    }
}