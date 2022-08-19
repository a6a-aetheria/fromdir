<?php

namespace A6a\FromDir;

use Composer\Autoload\ClassLoader;
use ReflectionClass;

use function dirname;
use function str_replace;
use function strtolower;

use const DIRECTORY_SEPARATOR;

trait AsDirectoryInPackageRoot
{
    public function directory(): string
    {
        $suffix = $this->name === '___'
            ? ''
            : (str_replace('___', DIRECTORY_SEPARATOR, $this->name) . DIRECTORY_SEPARATOR);

        return dirname((new ReflectionClass(ClassLoader::class))->getFileName(), 3) . DIRECTORY_SEPARATOR . $suffix;
    }

    public function dir(): string
    {
        return $this->directory();
    }

    public function asDir(): string
    {
        return $this->directory();
    }

    public function asDirectory(): string
    {
        return $this->directory();
    }

    public function asDirectoryInPackageRoot(): string
    {
        return $this->directory();
    }
}
