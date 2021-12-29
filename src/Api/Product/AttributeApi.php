<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class AttributeApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getAttributes(int $category_id, string $language = null): array
    {
        $query = [
            'category_id' => $category_id,
            'language' => $language ?? config('shopee.language'),
        ];
        $path = 'product/get_attributes';
        return $this->get($this->configuration, $path, $query);
    }

    public function getAttributeRecommend(string $item_name = null, int $cover_image_id = null, int $category_id = null): array
    {
        $query = [
            'item_name' => $item_name,
            'cover_image_id' => $cover_image_id,
            'category_id' => $category_id,
        ];

        $path = 'product/get_recommend_attribute';
        return $this->get($this->configuration, $path, $query);
    }
}
