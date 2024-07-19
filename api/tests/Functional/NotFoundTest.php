<?php

declare(strict_types=1);

namespace Test\Functional;

use Slim\Psr7\Factory\ServerRequestFactory;

class NotFoundTest extends WebTestCase
{
    /**
     * @coversNothing
     */
    public function testNotFound(): void
    {
        $app = $this->app();
        $request = (new ServerRequestFactory())->createServerRequest('GET', '/not-found');
        $response = $app->handle($request);

        self::assertEquals(404, $response->getStatusCode());
    }
}