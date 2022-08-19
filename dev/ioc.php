<?php

use Dice\Dice;
use Demo\From;

return (new Dice())
    ->addRules(require From::dev->dir() . 'core.php');
