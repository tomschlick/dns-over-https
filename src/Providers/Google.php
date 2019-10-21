<?php

namespace TomSchlick\DoH\Providers;

class Google extends ProviderBase
{
    public function endpoints(): array
    {
        return [
            'https://dns.google/resolve',
        ];
    }
}
