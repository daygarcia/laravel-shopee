<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class StockApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function updateStock(array $data): array
    {
        $path = 'product/update_stock';
        return $this->post($this->configuration, $path, $data);
    }
}
