<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitcb21ac159de77a404d136932a4f8d5a8
{
    public static $prefixLengthsPsr4 = array (
        'x' => 
        array (
            'xPaw\\SourceQuery\\' => 17,
        ),
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
        'C' => 
        array (
            'Composer\\Installers\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'xPaw\\SourceQuery\\' => 
        array (
            0 => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery',
        ),
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
        'Composer\\Installers\\' => 
        array (
            0 => __DIR__ . '/..' . '/composer/installers/src/Composer/Installers',
        ),
    );

    public static $prefixesPsr0 = array (
        'P' => 
        array (
            'PayPal' => 
            array (
                0 => __DIR__ . '/..' . '/paypal/rest-api-sdk-php/lib',
            ),
        ),
    );

    public static $classMap = array (
        'xPaw\\SourceQuery\\Buffer' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Buffer.php',
        'xPaw\\SourceQuery\\Exception\\AuthenticationException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/AuthenticationException.php',
        'xPaw\\SourceQuery\\Exception\\InvalidArgumentException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/InvalidArgumentException.php',
        'xPaw\\SourceQuery\\Exception\\InvalidPacketException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/InvalidPacketException.php',
        'xPaw\\SourceQuery\\Exception\\SocketException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/SocketException.php',
        'xPaw\\SourceQuery\\Exception\\SourceQueryException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/SourceQueryException.php',
        'xPaw\\SourceQuery\\Exception\\TimeoutException' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Exception/TimeoutException.php',
        'xPaw\\SourceQuery\\GoldSourceRcon' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/GoldSourceRcon.php',
        'xPaw\\SourceQuery\\Socket' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/Socket.php',
        'xPaw\\SourceQuery\\SourceQuery' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/SourceQuery.php',
        'xPaw\\SourceQuery\\SourceRcon' => __DIR__ . '/..' . '/xpaw/php-source-query-class/SourceQuery/SourceRcon.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitcb21ac159de77a404d136932a4f8d5a8::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitcb21ac159de77a404d136932a4f8d5a8::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInitcb21ac159de77a404d136932a4f8d5a8::$prefixesPsr0;
            $loader->classMap = ComposerStaticInitcb21ac159de77a404d136932a4f8d5a8::$classMap;

        }, null, ClassLoader::class);
    }
}