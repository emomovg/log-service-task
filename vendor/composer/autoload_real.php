<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInit95023f1d97286ac3fbb4af87dd86178d
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

        spl_autoload_register(array('ComposerAutoloaderInit95023f1d97286ac3fbb4af87dd86178d', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInit95023f1d97286ac3fbb4af87dd86178d', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInit95023f1d97286ac3fbb4af87dd86178d::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}