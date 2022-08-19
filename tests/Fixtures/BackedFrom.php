<?php

namespace Fixtures;

use A6a\FromDir\AsDirectoryInPackageRootWithBackedEnum;
use A6a\FromDir\NamesDirectoryInPackageRoot;

enum BackedFrom: string implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRootWithBackedEnum;

    case ___ = '___';
    case TESTS = 'tests';
    case TESTS___UNIT = 'tests___Unit';
}
