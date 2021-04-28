<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit55520d52c8103372454d3308ad47e83c
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Codeex\\RoleAssignment\\' => 22,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Codeex\\RoleAssignment\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit55520d52c8103372454d3308ad47e83c::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit55520d52c8103372454d3308ad47e83c::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit55520d52c8103372454d3308ad47e83c::$classMap;

        }, null, ClassLoader::class);
    }
}