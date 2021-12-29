<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class TierVariationApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function createTierVariation(array $data): array
    {
        $path = 'product/init_tier_variation';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateTierVariation(array $data): array
    {
        $path = 'product/update_tier_variation';
        return $this->post($this->configuration, $path, $data);
    }
}
