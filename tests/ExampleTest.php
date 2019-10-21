<?php

declare(strict_types=1);

namespace TomSchlick\DoH\Tests;

use PHPUnit\Framework\TestCase;
use TomSchlick\DoH\DnsOverHttps;
use TomSchlick\DoH\Providers\Cloudflare;
use TomSchlick\DoH\Providers\Google;
use TomSchlick\DoH\RecordType;
use TomSchlick\DoH\StatusType;

class ExampleTest extends TestCase
{
    /** @test */
    public function test_cloudflare()
    {
        $doh = new DnsOverHttps(new Cloudflare());

        $result = $doh->fetch('tomschlick.com', RecordType::A);

        $this->assertEquals(StatusType::NO_ERROR, $result->getStatus()->value);
    }

    /** @test */
    public function test_google()
    {
        $doh = new DnsOverHttps(new Google());

        $result = $doh->fetch('tomschlick.com', RecordType::A);

        $this->assertEquals(StatusType::NO_ERROR, $result->getStatus()->value);
    }

}
