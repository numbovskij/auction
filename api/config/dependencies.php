<?php

declare(strict_types=1);

/** @psalm-suppress RiskyTruthyFalsyComparison */
$files = array_merge(
    glob(__DIR__ . '/common/*.php') ?: [],
    glob(__DIR__ . '/' . (getenv('APP_ENV') ?: 'prod') . '/*.php') ?: [],
);

$configs = array_map(
    /** @psalm-suppress UnresolvableInclude */
    static function (string $file): array {
        return require $file;
    },
    $files,
);

return array_merge_recursive(... $configs);
