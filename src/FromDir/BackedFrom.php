<?php

namespace A6a\FromDir;

/**
 * Enums cannot extend other enums. Make a backed enum like this one and add some cases.
 */
enum BackedFrom: string implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRootWithBackedEnum;

    // optional: this case provides the package root
    case ___ = '___';
    case VENDOR = 'vendor';
}
