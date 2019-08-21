<?php

namespace TomSchlick\DoH\Providers;

abstract class ProviderBase
{
    abstract public function endpoints() : array;

    abstract public function ipv4Addresses() : ?array;

    abstract public function ipv6Addresses() : ?array;
}
