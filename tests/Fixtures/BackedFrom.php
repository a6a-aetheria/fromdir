<?php

namespace Fixtures;

use A6a\From\AsDirectoryInPackageRootWithBackedEnum;
use A6a\From\NamesDirectoryInPackageRoot;

enum BackedFrom: string implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRootWithBackedEnum;

    case ___ = '___';
    case TESTS = 'tests';
    case TESTS___UNIT = 'tests___Unit';
}
