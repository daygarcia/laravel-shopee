<?php

namespace LaravelShopee;

use Illuminate\Support\Facades\Http;
use LaravelShopee\AuthenticationSignature;
use LaravelShopee\Configuration;

class Authentication
{
    public function authenticate(Configuration $configuration, string $path, array $body): array
    {
        return Http::post($this->getSignedUrl($configuration, $path), $body)->throw()->json();
    }

    public function getSignedUrl(Configuration $configuration, string $path): string
    {
        $signature = new AuthenticationSignature(
            $configuration->getPartnerId(),
            $configuration->getKey(),
            $path,
        );
        $signature->signRequest();

        return $signature->getSignedUrl();
    }
}
