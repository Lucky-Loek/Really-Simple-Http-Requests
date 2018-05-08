<?php

namespace ReallySimpleHttpRequests;


interface ResponseInterface
{
    public function getStatusCode();

    public function getBody();

    public function getHeader();

    public function getAllHeaders();
}