<?php

use Dotenv\Dotenv;
use Demo\From;

$dotenv = Dotenv::createImmutable(From::___->dir());
$dotenv->load();

$dotenv->ifPresent('IMMUTABLE_DATETIME')->isBoolean();
