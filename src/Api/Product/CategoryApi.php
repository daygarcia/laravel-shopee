<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class CategoryApi extends Api
{
    // construct
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getCategories(): array
    {
        $url = 'product/get_category';
        return $this->get($this->configuration->getAccessToken(), $url);
    }
}
