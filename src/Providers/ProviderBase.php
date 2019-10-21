<?php declare(strict_types=1);

namespace TomSchlick\DoH\Providers;


abstract class ProviderBase
{
    abstract public function endpoints() : array;


}
