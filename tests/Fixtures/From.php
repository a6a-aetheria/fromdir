<?php

namespace Fixtures;

use A6a\FromDir\AsDirectoryInPackageRoot;
use A6a\FromDir\NamesDirectoryInPackageRoot;

enum From implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRoot;

    case ___;
    case tests;
    case tests___Unit;
}
