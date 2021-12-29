<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class CategoryApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getCategories(string $language = null): array
    {
        $query = [
            'language' => $language ?? config('shopee.language'),
        ];
        $path = 'product/get_category';
        return $this->get($this->configuration, $path, $query);
    }

    public function getCategoryRecommendByItemName(string $item_name): array
    {
        $query = [
            'item_name ' => $item_name,
        ];
        $path = 'product/category_recommend';
        return $this->get($this->configuration, $path, $query);
    }
}
