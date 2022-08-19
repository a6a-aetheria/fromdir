<?php

use Dice\Dice;
use Demo\From as From;

/**
 * @param class-string $classString
 */
function make(string $classString): mixed {
    static $container;
    if (! $container) {
        /** @var Dice $container */
        $container = require From::dev->dir() . 'ioc.php';
    }

    return $container->create($classString);
}
