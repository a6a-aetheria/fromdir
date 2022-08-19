# From
An interface with implementing traits for both pure and backed enums, which adds methods to convert cases to filesystem
paths relative to the package root.

## Usage
>🎪 PHP does not allow us to extend an enum, so usage is a hoop to jump through.

### Uppercase Enum Cases
> 💡 Where pure enums with mixed-case case names are preferred refer to the 
> [Mixed-case Enum Cases](#mixed-case-enum-cases) section.

Create a new, string-backed `enum` that implements `NamesDirectoryInPackageRoot` and uses
`AsDirectoryInPackageRootWithBackedEnum`, and add a case label having a value for each path.

Notes:
- converting case values to paths is case-sensitive!
- the `___` case is the package root itself
- where `___` is present other than at the start of a case value, it is replaced with `DIRECTORY_SEPERATOR`

```php
<?php

namespace Foo;

use A6a\From\AsDirectoryInPackageRootWithBackedEnum;
use A6a\From\NamesDirectoryInPackageRoot;

enum From implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRootWithBackedEnum;
    
    case ___ = '___';
    case BOOTSTRAP_HANDLERS = 'bootstrap___handlers';
}


echo From::___->dir() . 'README.md';
echo From::BOOTSTRAP_HANDLERS->dir() . 'collision.php';
```

Output:
```
/path/to/project/README.md
/path/to/project/bootstrap/handlers/collision.php
```

### Mixed-case Enum Cases
> 💡 Where backed enums with uppercase enum case names are preferred refer to the 
> [Uppercase Enum Cases](#uppercase-enum-cases) section.

Create a new, pure `enum` that implements `NamesDirectoryInPackageRoot` and uses `AsDirectoryInPackageRoot`, and add a case
label for each path.

Notes:
- converting case labels to paths is case-sensitive!
- the `___` case is the package root itself
- where `___` is present other than at the start of a case name, it is replaced with `DIRECTORY_SEPERATOR`

```php
<?php

namespace Foo;

use A6a\From\AsDirectoryInPackageRoot;
use A6a\From\NamesDirectoryInPackageRoot;

enum From implements NamesDirectoryInPackageRoot
{
    use AsDirectoryInPackageRoot;
    
    case ___;
    case bootstrap___handlers;
}


echo From::___->dir() . 'README.md';
echo From::bootstrap___handlers->dir() . 'collision.php';
```

Output:
```
/path/to/project/README.md
/path/to/project/bootstrap/handlers/collision.php
```

## License
See the [LICENSE](LICENSE) file for license rights and limitations (BSD-3-Clause).
