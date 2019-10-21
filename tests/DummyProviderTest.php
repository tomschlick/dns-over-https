<?php

namespace TomSchlick\DoH\Tests;

use PHPUnit\Framework\TestCase;
use TomSchlick\DoH\DnsOverHttps;
use TomSchlick\DoH\Providers\Dummy;
use TomSchlick\DoH\RecordType;
use TomSchlick\DoH\StatusType;

class DummyProviderTest extends TestCase
{
    /**
     * @var \TomSchlick\DoH\DnsOverHttps
     */
    private $client;

    protected function setUp(): void
    {
        parent::setUp();

        $this->client = new DnsOverHttps(new Dummy());
    }

    /** @test */
    public function non_existant_domain_fails()
    {
        $response = $this->client->fetch('nonexistant.domain', RecordType::A);

        $this->assertFalse($response->wasSuccessful());
        $this->assertEquals(StatusType::NON_EXISTANT_DOMAIN, $response->getStatus()->value);

        $this->assertEquals('nonexistant.domain.', $response->getQuestion()[0]['name']);
        $this->assertEquals(RecordType::A, $response->getQuestion()[0]['type']);
    }

    /** @test */
    public function real_domain_resolves()
    {
        $response = $this->client->fetch('cloudflare-dns.com', RecordType::A);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(StatusType::NO_ERROR, $response->getStatus()->value);

        $this->assertEquals('cloudflare-dns.com.', $response->getQuestion()[0]['name']);
        $this->assertEquals(RecordType::A, $response->getQuestion()[0]['type']);
    }

    /** @test */
    public function multiple_answers_can_be_found()
    {
        $response = $this->client->fetch('google.com', RecordType::MX);

        $this->assertTrue($response->wasSuccessful());
        $this->assertEquals(StatusType::NO_ERROR, $response->getStatus()->value);

        $this->assertEquals('google.com.', $response->getQuestion()[0]['name']);
        $this->assertEquals(RecordType::MX, $response->getQuestion()[0]['type']);

        $this->assertCount(5, $response->getAnswer());
    }
}
