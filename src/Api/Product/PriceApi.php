<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class PriceApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function updatePrice(array $data): array
    {
        $path = 'product/update_price';
        return $this->post($this->configuration, $path, $data);
    }
}
