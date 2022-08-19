# From
An interface and implementing trait for pure enums that adds a method to convert case labels to filesystem paths 
relative to the package root.

## Usage
> PHP does not allow us to extend an enum, so usage is a hoop to jump through.

Create a new `enum` that implements `NamesDirectoryInPackageRoot` and uses `AsDirectoryInPackageRoot`, and add a case
label for each path.

Notes:
- converting cases to paths is case-sensitive!
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
