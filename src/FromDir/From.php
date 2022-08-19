<?php

namespace A6a\FromDir;

/**
 * Enums cannot extend other enums. Make a pure enum like this one and add some cases.
 */
enum From implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRoot;

    // optional: this case provides the package root
    case ___;
    case vendor;
}
