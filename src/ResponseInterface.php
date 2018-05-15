<?php

namespace ReallySimpleHttpRequests;


interface ResponseInterface
{
    /**
     * @return int
     */
    public function getStatusCode();

    /**
     * @return string
     */
    public function getBody();

    /**
     * @return string
     */
    public function getHeader($header);

    /**
     * @return array
     */
    public function getAllHeaders();
}