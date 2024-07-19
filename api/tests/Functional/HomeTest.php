<?php

declare(strict_types=1);

namespace Test\Functional;


use Slim\Psr7\Factory\ServerRequestFactory;

class HomeTest extends WebTestCase
{
    /**
     * @coversNothing
     */
    public function testHome(): void {

        $app = $this->app();
        $request = (new ServerRequestFactory())->createServerRequest('GET', '/');
        $response = $app->handle($request);

        self::assertEquals(200, $response->getStatusCode());
        self::assertEquals('{}', (string)$response->getBody());
        self::assertEquals('application/json; charset=utf-8', $response->getHeaderLine('Content-Type'));
    }
}