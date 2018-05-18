<?php

namespace ReallySimpleHttpRequests;

interface ResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode(): int;

    /**
     * @return string
     */
    public function getBody(): string;

    /**
     * @param string $key
     * @return array|null
     */
    public function getHeader(string $key): ?array;

    /**
     * @return array
     */
    public function getAllHeaders(): array;
}