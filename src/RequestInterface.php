<?php

namespace ReallySimpleHttpRequests;

interface RequestInterface
{
    /**
     * @return ResponseInterface
     */
    public function send();

    /**
     * @param string $url
     */
    public function setUrl(string $url);

    /**
     * @param string $method
     */
    public function setMethod(string $method);

    /**
     * @param string $body
     */
    public function setBody(string $body);

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader(string $key, string $value);

    /**
     * @param $key
     */
    public function removeHeader(string $key);

    /**
     * @param string $key
     * @return array|null
     */
    public function getHeader(string $key): ?string;
}