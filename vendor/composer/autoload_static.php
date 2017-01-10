<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit31b9322b9ebccbb306c7e7fe7b8628a6
{
    public static $files = array (
        '45e8c92354af155465588409ef796dbc' => __DIR__ . '/..' . '/bcosca/fatfree/lib/base.php',
    );

    public static $prefixLengthsPsr4 = array (
        'T' => 
        array (
            'TeamleaderExercise1\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'TeamleaderExercise1\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit31b9322b9ebccbb306c7e7fe7b8628a6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit31b9322b9ebccbb306c7e7fe7b8628a6::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
