<?php

declare(strict_types=1);

namespace Test\Unit\Http;

use App\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    /**
     * @covers \App\Http\JsonResponse::someMethod
     */
    public function testInt(): void {
        $response = new JsonResponse(12);

        self::assertEquals(12, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }
}