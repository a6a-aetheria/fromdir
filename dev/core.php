<?php

return [
    DateTimeInterface::class => [
        'instanceOf' => $_ENV['IMMUTABLE_DATETIME'] ?? false
            ? DateTimeImmutable::class
            : DateTime::class,
    ],
];
