<?php

namespace LaravelShopee;

use LaravelShopee\AuthorizationSignature;
use LaravelShopee\Configuration;

class Authorization
{
    public function getAuthorizationUrl(Configuration $configuration, string $path, string $redirect): string
    {
        return $this->getSignedUrl($configuration, $path, $redirect);
    }

    public function getSignedUrl(Configuration $configuration, string $path, string $redirect): string
    {
        $signature = new AuthorizationSignature(
            $configuration->getPartnerId(),
            $configuration->getKey(),
            $path,
            $redirect,
        );
        $signature->signRequest();

        return $signature->getSignedUrl();
    }
}
