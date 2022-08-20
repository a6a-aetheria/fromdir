<?php

namespace A6a\FromDir;

use Composer\Autoload\ClassLoader;
use ReflectionClass;

use function dirname;
use function str_replace;

use const DIRECTORY_SEPARATOR;

trait AsDirectoryInPackageRoot
{
    public function dir(): string
    {
        $suffix = $this->name === '___'
            ? ''
            : (str_replace('___', DIRECTORY_SEPARATOR, $this->name) . DIRECTORY_SEPARATOR);

        return dirname((new ReflectionClass(ClassLoader::class))->getFileName(), 3) . DIRECTORY_SEPARATOR . $suffix;
    }

    public function asDirectoryInPackageRoot(): string
    {
        return $this->dir();
    }

    public function asDir(): string
    {
        return $this->dir();
    }

    public function asDirectory(): string
    {
        return $this->dir();
    }

    public function directory(): string
    {
        return $this->dir();
    }
}
