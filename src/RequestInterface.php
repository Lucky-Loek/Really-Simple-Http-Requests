<?php

namespace ReallySimpleHttpRequests;


interface RequestInterface
{
    /**
     * @return mixed
     */
    public function send();

    /**
     * @param string $url
     */
    public function setUrl($url);

    /**
     * @param string $method
     */
    public function setMethod($method);

    /**
     * @param string $body
     */
    public function setBody($body);

    /**
     * @param string $key
     * @param string $value
     */
    public function addHeader($key, $value);

    /**
     * @param $key
     */
    public function removeHeader($key);
}