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

    public function __construct(string $body, int $statusCode, array $headers)
    {
        $this->body = $body;
        $this->statusCode = $statusCode;
        $this->headers = $headers;
    }

    /**
     * @return int
     */
    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    /**
     * @return string
     */
    public function getBody(): string
    {
        return $this->body;
    }

    /**
     * @param string $key
     * @return string|null
     */
    public function getHeader(string $key): ?array
    {
        if (array_key_exists($key, $this->headers)) {
            return $this->headers[$key];
        }

        return null;
    }

    /**
     * @return array
     */
    public function getAllHeaders(): array
    {
        return $this->headers;
    }
}
