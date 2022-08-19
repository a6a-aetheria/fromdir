# From
An interface with implementing traits for both pure and backed enums, which adds methods to convert cases to filesystem
paths relative to the package root.

Note: this is fresh, with only one consuming use case in a private project. It may not survive the continued refactoring 
of that codebase, as it may turn out to be more trouble than it is worth to use something like this.

## Use Case
When referring to files other than automatically loaded classes in the local file system we need to 
`__DIR__ . '/../config/handlers.php'` and similar. Is there a simple way to access files in the project root of the 
downstream project, the project which required our package? 

With `From`, resolving the path to the downstream project root is done with `From::___->dir()`. This enables library 
code to interact with files of the consuming package, especially configuration files, in a _relatively_ simple way.

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

enum From: string implements NamesDirectoryInPackageRoot
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
