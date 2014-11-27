<?php

// autoload_real.php @generated by Composer

<<<<<<< HEAD
class ComposerAutoloaderInit0407607de61f2e1f78415f3ce3447b43
=======
class ComposerAutoloaderInitaa9b406ec9cfd7f0c3bbe481bff1b843
>>>>>>> 1c41c29168e9c7ceec2d735a6a8cb6dfa2ab0a11
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

<<<<<<< HEAD
        spl_autoload_register(array('ComposerAutoloaderInit0407607de61f2e1f78415f3ce3447b43', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInit0407607de61f2e1f78415f3ce3447b43', 'loadClassLoader'));
=======
        spl_autoload_register(array('ComposerAutoloaderInitaa9b406ec9cfd7f0c3bbe481bff1b843', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader();
        spl_autoload_unregister(array('ComposerAutoloaderInitaa9b406ec9cfd7f0c3bbe481bff1b843', 'loadClassLoader'));
>>>>>>> 1c41c29168e9c7ceec2d735a6a8cb6dfa2ab0a11

        $includePaths = require __DIR__ . '/include_paths.php';
        array_push($includePaths, get_include_path());
        set_include_path(join(PATH_SEPARATOR, $includePaths));

        $map = require __DIR__ . '/autoload_namespaces.php';
        foreach ($map as $namespace => $path) {
            $loader->set($namespace, $path);
        }

        $map = require __DIR__ . '/autoload_psr4.php';
        foreach ($map as $namespace => $path) {
            $loader->setPsr4($namespace, $path);
        }

        $classMap = require __DIR__ . '/autoload_classmap.php';
        if ($classMap) {
            $loader->addClassMap($classMap);
        }

        $loader->register(true);

        $includeFiles = require __DIR__ . '/autoload_files.php';
        foreach ($includeFiles as $file) {
            composerRequire0407607de61f2e1f78415f3ce3447b43($file);
        }

        return $loader;
    }
}

function composerRequire0407607de61f2e1f78415f3ce3447b43($file)
{
    require $file;
}
