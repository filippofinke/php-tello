<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit578643b16abaed507e382f8efbd17bd6
{
    public static $prefixLengthsPsr4 = array (
        'C' => 
        array (
            'Classes\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Classes\\' => 
        array (
            0 => __DIR__ . '/../..' . '/classes',
        ),
    );

    public static $classMap = array (
        'Classes\\Command' => __DIR__ . '/../..' . '/classes/Command.php',
        'Classes\\Commands' => __DIR__ . '/../..' . '/classes/Commands.php',
        'Classes\\StatusParser' => __DIR__ . '/../..' . '/classes/StatusParser.php',
        'Classes\\UdpClient' => __DIR__ . '/../..' . '/classes/UdpClient.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit578643b16abaed507e382f8efbd17bd6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit578643b16abaed507e382f8efbd17bd6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit578643b16abaed507e382f8efbd17bd6::$classMap;

        }, null, ClassLoader::class);
    }
}
