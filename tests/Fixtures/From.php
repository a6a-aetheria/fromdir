<?php

namespace Fixtures;

use A6a\From\AsDirectoryInPackageRoot;
use A6a\From\NamesDirectoryInPackageRoot;

enum From implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRoot;

    case ___;
    case tests;
    case tests___Unit;
}
