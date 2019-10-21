<?php

declare(strict_types=1);

namespace TomSchlick\DoH\Providers;

use TomSchlick\DoH\QueryReponse;

class Dummy extends ProviderBase
{
    public function endpoints(): array
    {
        return [
            'https://example.com/query',
        ];
    }

    public function fetch(string $name, int $type): QueryReponse
    {
        $file = realpath(__DIR__."/../../stubs/$name-$type.json");

        $contents = json_decode(file_get_contents($file), true);

        return new QueryReponse($contents);
    }
}
