<?php

declare(strict_types=1);

namespace App\Http\Test\Unit;

use App\Http\JsonResponse;
use PHPUnit\Framework\TestCase;

class JsonResponseTest extends TestCase
{
    /**
     * @covers \App\Http\JsonResponse
     */
    public function testInt(): void {
        $response = new JsonResponse(12);

        self::assertEquals(12, $response->getBody()->getContents());
        self::assertEquals(200, $response->getStatusCode());
    }

    /**
     * @covers \App\Http\JsonResponse::__construct
     * @covers \App\Http\JsonResponse::getBody
     * @covers \App\Http\JsonResponse::getHeaderLine
     * @covers \App\Http\JsonResponse::getStatusCode
     *
     * @dataProvider getClass
     * @param mixed $source
     * @param mixed $expect
     */
    public function testResponse($source, $expect): void
    {
        $response = new JsonResponse($source);

        self::assertEquals($expect, $response->getBody()->getContents());
        self::assertEquals('application/json; charset=utf-8', $response->getHeaderLine('Content-Type'));
        self::assertEquals(200, $response->getStatusCode());
    }

    public static function getClass(): array
    {
        $object = new \stdClass();
        $object->str = 'value';
        $object->int = 1;
        $object->none = null;

        $array = [
            'str' => 'value',
            'int' => 1,
            'none' => null,
        ];

        return [
            'null' => [null, 'null'],
            'empty' => ['', '""'],
            'number' => [12, '12'],
            'string' => ['12', '"12"'],
            'object' => [$object, '{"str":"value","int":1,"none":null}'],
            'array' => [$array, '{"str":"value","int":1,"none":null}'],
        ];
    }
}