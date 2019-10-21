<?php

declare(strict_types=1);

namespace TomSchlick\DoH;

use TomSchlick\DoH\Providers\ProviderBase;

class DnsOverHttps
{
    /**
     * @var \TomSchlick\DoH\Providers\ProviderBase
     */
    protected $provider;

    public function __construct(ProviderBase $provider)
    {
        $this->setProvider($provider);
    }

    public function setProvider(ProviderBase $provider) : void
    {
        $this->provider = $provider;
    }

    public function fetch(string $name, int $type)
    {
        return $this->provider->fetch($name, $type);
    }
}
