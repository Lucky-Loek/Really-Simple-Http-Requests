<?php

namespace ReallySimpleHttpRequests;


use Webmozart\Assert\Assert;

class Response implements ResponseInterface
{
    /**
     * @var string
     */
    private $body;

    /**
     * @var int
     */
    private $statusCode;

    /**
     * @var array
     */
    private $headers;

    public function __construct($body, $statusCode, $headers)
    {
        Assert::string($body);
        Assert::numeric($statusCode);
        Assert::isArray($headers);

        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @return string
     */
    public function getHeader($header)
    {
        Assert::string($header);
        Assert::keyExists($this->headers, $header);
        return $this->headers[$header];
    }

    /**
     * @return array
     */
    public function getAllHeaders()
    {
        return $this->headers;
    }
}
