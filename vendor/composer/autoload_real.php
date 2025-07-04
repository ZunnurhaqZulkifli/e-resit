<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit7bba216bda58b5a6b9af4fc649c4ed6f
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInit7bba216bda58b5a6b9af4fc649c4ed6f', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit7bba216bda58b5a6b9af4fc649c4ed6f', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit7bba216bda58b5a6b9af4fc649c4ed6f::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
