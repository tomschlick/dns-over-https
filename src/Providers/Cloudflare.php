<?php

declare(strict_types=1);

namespace TomSchlick\DoH\Providers;

class Cloudflare extends ProviderBase
{
    public function endpoints(): array
    {
        return [
            'https://cloudflare-dns.com/dns-query',
        ];
    }
}
