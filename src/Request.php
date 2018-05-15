<?php

namespace ReallySimpleHttpRequests;

use GuzzleHttp\Client;
use Webmozart\Assert\Assert;

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

    /**
     * @return ResponseInterface|null
     */
    public function send()
    {
        // TODO: Implement send() method.
    }

    /**
     * @param string $url
     */
    public function setUrl($url)
    {
        Assert::string($url);
        $this->url = $url;
    }

    /**
     * @param string $method
     */
    public function setMethod($method)
    {
        Assert::string($method);
        $method = strtolower($method);
        Assert::oneOf($method, ['get', 'post', 'put', 'patch', 'delete']);
        $this->method = $method;
    }

    /**
     * @param string $body
     */
    public function setBody($body)
    {
        Assert::string($body);
        $this->body = $body;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value)
    {
        Assert::string($key);
        Assert::string($value);
        $this->headers[$key] = $value;
    }

    /**
     * @param $key
     */
    public function removeHeader($key)
    {
        Assert::string($key);
        Assert::keyExists($this->headers, $key);
        unset($this->headers[$key]);
    }
}
