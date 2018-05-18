<?php

namespace ReallySimpleHttpRequests;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
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

    public function __construct(string $url, string $method, ?string $body = null, array $headers = [])
    {
        $this->client = new Client();
        $this->setUrl($url);
        $this->setMethod($method);
        $this->setBody($body);

        foreach ($headers as $key => $value) {
            $this->addHeader($key, $value);
        }
    }

    /**
     * @return ResponseInterface
     * @throws GuzzleException
     */
    public function send()
    {
        $reply = $this->client->request(
            $this->method,
            $this->url,
            [
                'body' => $this->body,
                'headers' => $this->headers
            ]
        );

        $response = new Response(
            $reply->getBody()->getContents(),
            $reply->getStatusCode(),
            $reply->getHeaders()
        );

        return $response;
    }

    /**
     * @param string $url
     */
    public function setUrl(string $url)
    {
        $this->url = $url;
    }

    /**
     * @return string
     */
    public function getUrl(): string
    {
        return $this->url;
    }

    /**
     * @param string $method
     */
    public function setMethod(string $method)
    {
        $method = strtolower($method);
        Assert::oneOf($method, ['get', 'post', 'put', 'patch', 'delete']);
        $this->method = $method;
    }

    /**
     * @return string
     */
    public function getMethod(): string
    {
        return $this->method;
    }

    /**
     * @param string $body
     */
    public function setBody(?string $body)
    {
        $this->body = $body;
    }

    /**
     * @return string|null
     */
    public function getBody(): ?string
    {
        return $this->body;
    }

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader(string $key, string $value)
    {
        $this->headers[$key] = $value;
    }

    /**
     * @param $key
     */
    public function removeHeader(string $key)
    {
        Assert::keyExists($this->headers, $key);
        unset($this->headers[$key]);
    }

    /**
     * @return array
     */
    public function getAllHeaders(): array
    {
        return $this->headers;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getHeader(string $key): ?string
    {
        if (array_key_exists($key, $this->headers)) {
            return $this->headers[$key];
        }

        return null;
    }
}
