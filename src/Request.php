<?php

namespace ReallySimpleHttpRequests;

use GuzzleHttp\Client;

class Request implements RequestInterface
{
    /**
     * @var Client
     */
    private $client;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $method;

    /**
     * @var string
     */
    private $body;

    /**
     * @var array
     */
    private $headers;

    public function __construct($url, $method, $body = null, $headers = [])
    {
        $this->client = new Client();
        $this->url = $url;
        $this->method = $method;
        $this->body = $body;
        $this->headers = $headers;
    }

    public function send()
    {
        // TODO: Implement setUrl() method.
    }

    public function setUrl()
    {
        // TODO: Implement setUrl() method.
    }

    public function setMethod()
    {
        // TODO: Implement setMethod() method.
    }

    public function setBody()
    {
        // TODO: Implement setBody() method.
    }

    public function addHeader()
    {
        // TODO: Implement addHeader() method.
    }

    public function removeHeader()
    {
        // TODO: Implement removeHeader() method.
    }
}
