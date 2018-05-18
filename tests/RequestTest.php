<?php

namespace ReallySimpleHttpRequests\Test;

use GuzzleHttp\Client;
use PHPUnit\Framework\TestCase;
use ReallySimpleHttpRequests\Request;

class RequestTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldInstantiateWithValidData()
    {
        $request = new Request('www.example.org', 'post', 'body', ['headerKey' => 'headerValue']);
        $this->assertInstanceOf(Request::class, $request);
    }

    /**
     * @test
     * @expectedException InvalidArgumentException
     */
    public function itShouldThrowExceptionWhenInstantiatedWithInvalidMethod()
    {
        new Request('www.example.org', 42);
    }

    /**
     * @test
     */
    public function itShouldGetUrl()
    {
        $request = new Request('www.example.org', 'GET');

        $this->assertSame('www.example.org', $request->getUrl());
    }

    /**
     * @test
     */
    public function itShouldGetMethod()
    {
        $request = new Request('www.example.org', 'GET');

        $this->assertSame('get' , $request->getMethod());
    }

    /**
     * @test
     */
    public function itShouldGetNullBody()
    {
        $request = new Request('www.example.org', 'GET');

        $this->assertNull($request->getBody());
    }

    /**
     * @test
     */
    public function itShouldReturnBadHeaderAsNull()
    {
        $request = new Request('www.example.org', 'GET', null, ['key' => 'value']);
        $this->assertNull($request->getHeader('nonExistent'));
    }

    /**
     * @test
     */
    public function itShouldRemoveValidHeader()
    {
        $headers = ['firstKey' => 'value', 'secondKey' => 'value'];
        $request = new Request('www.example.org', 'post', 'body', $headers);
        $request->removeHeader('secondKey');

        $this->assertSame(['firstKey' => 'value'], $request->getAllHeaders());
    }

    /**
     * @test
     */
    public function itShouldReturnValidHeader()
    {
        $headers = ['firstKey' => 'firstValue', 'secondKey' => 'secondValue'];
        $request = new Request('www.example.org', 'post', 'body', $headers);

        $this->assertSame('firstValue', $request->getHeader('firstKey'));
    }

    /**
     * @test
     */
    public function itShouldCreateValidResponseOnSend()
    {
        $body = 'body';
        $statusCode = 200;
        $headers = ['key' => 'value'];
        $responseHeaders = ['key' => ['value']];

        $request = new Request('www.example.org', 'get');
        $guzzleResponse = new \GuzzleHttp\Psr7\Response($statusCode, $headers, $body);

        $guzzleMock = $this->createMock(Client::class);
        $guzzleMock->method('request')->willReturn($guzzleResponse);

        $setClientClosure = function() use ($guzzleMock) {
            $this->client = $guzzleMock;
        };
        $doSetClientClosure = $setClientClosure->bindTo($request, get_class($request));
        $doSetClientClosure();

        $response = $request->send();

        $this->assertSame($body, $response->getBody());
        $this->assertSame($statusCode, $response->getStatusCode());
        $this->assertSame($responseHeaders, $response->getAllHeaders());
        $this->assertSame($responseHeaders['key'], $response->getHeader('key'));
    }
}