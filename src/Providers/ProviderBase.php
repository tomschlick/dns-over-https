<?php

declare(strict_types=1);

namespace TomSchlick\DoH\Providers;

use TomSchlick\DoH\RecordType;
use TomSchlick\DoH\QueryReponse;
use GuzzleHttp\Client as GuzzleClient;
use function GuzzleHttp\Psr7\build_query;

abstract class ProviderBase
{
    abstract public function endpoints() : array;

    public function fetch(string $name, int $type) : QueryReponse
    {
        $recordType = new RecordType($type);

        $options = [
            'headers' => ['accept' => 'application/dns-json'],
        ];

        foreach ($this->endpoints() as $endpoint) {
            $url = $endpoint.'?'.build_query([
                    'name' => $name,
                    'type' => $recordType->description,
                ]);

            $response = $this->getHttpClient()->get($url, $options);

            if ($response->getStatusCode() == 200) {
                return new QueryReponse($response->getBody());
            }
        }
    }

    public function getHttpClient()
    {
        return new GuzzleClient();
    }
}
