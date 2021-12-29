<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class DtsApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getDtsLimit(int $category_id): array
    {
        $query = [
            'category_id' => $category_id,
        ];
        $path = 'product/get_dts_limit';
        return $this->get($this->configuration, $path, $query);
    }
}
