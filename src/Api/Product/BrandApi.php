<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class BrandApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getBrands(int $category_id, int $page_size = 10, int $status = 1, int $offset = 0, string $language = null): array
    {
        $query = [
            'page_size'     => $page_size,
            'category_id'   => $category_id,
            'status'        => $status,
            'offset'        => $offset,
            'language'      => $language ?? config('shopee.language'),
        ];
        $path = 'product/get_brand_list';
        return $this->get($this->configuration, $path, $query);
    }

    public function createBrand(array $data): array
    {
        $path = 'product/create_brand';
        return $this->post($this->configuration, $path, $data);
    }
}
