<?php

namespace ReallySimpleHttpRequests\Test;

use PHPUnit\Framework\TestCase;
use ReallySimpleHttpRequests\Response;

class ResponseTest extends TestCase
{
    /**
     * @test
     */
    public function itShouldReturnBadHeaderAsNull()
    {
        $request = new Response('body', 200, ['key' => 'value']);
        $this->assertNull($request->getHeader('nonExistent'));
    }
}