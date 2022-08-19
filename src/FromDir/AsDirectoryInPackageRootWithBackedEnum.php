<?php

namespace A6a\FromDir;

use Composer\Autoload\ClassLoader;
use ReflectionClass;

use function dirname;
use function str_replace;
use function strtolower;

use const DIRECTORY_SEPARATOR;

trait AsDirectoryInPackageRootWithBackedEnum
{
    public function dir(): string
    {
        $suffix = $this->value === '___'
            ? ''
            : (str_replace('___', DIRECTORY_SEPARATOR, $this->value) . DIRECTORY_SEPARATOR);

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
