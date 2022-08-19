<?php

namespace A6a\From;

interface NamesDirectoryInPackageRoot
{
    public function directory(): string;

    public function dir(): string;

    public function asDir(): string;

    public function asDirectory(): string;

    public function asDirectoryInPackageRoot(): string;
}
