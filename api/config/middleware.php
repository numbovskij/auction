<?php

declare(strict_types=1);

use Psr\Container\ContainerInterface;
use Slim\App;

return static function (App $app, ContainerInterface $container): void {
    $config = $container->get('config');

    $app->addErrorMiddleware($config['debug'], $config['env'] !== 'test', true);
};
