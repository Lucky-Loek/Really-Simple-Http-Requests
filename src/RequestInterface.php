<?php

namespace ReallySimpleHttpRequests;


interface RequestInterface
{
    public function send();

    public function setUrl();

    public function setMethod();

    public function setBody();

    public function addHeader();

    public function removeHeader();
}