# Really Simple HTTP Requests

[![Build Status](https://travis-ci.com/loekiedepo/Really-Simple-Http-Requests.svg?branch=master)](https://travis-ci.com/loekiedepo/Really-Simple-Http-Requests) [![codecov](https://codecov.io/gh/loekiedepo/Really-Simple-Http-Requests/branch/master/graph/badge.svg)](https://codecov.io/gh/loekiedepo/Really-Simple-Http-Requests)



A framework-agnostic wrapper for really easy HTTP requests in PHP.

This is a package for people who want to easily send requests and expect a status code and body back. Nothing more, nothing less.

## Usage

```php
$request = new Request(
    'www.httpbin.org/post',
    'post',
    'This is a nice body!',
    [
        'X-Csrf-Token' => 'notSoSafeToken'
    ]
);

$response = $request->send();

echo $response->getBody();
echo $response->getStatusCode();

// You can secretly take a look at the headers too!
echo $response->getHeader('Content-Length');

// Get them all!
foreach $response->getAllHeaders() as $header {
    echo $header;
}
```
