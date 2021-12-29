<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class SizeChartApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getSupportedSizeChart(int $category_id): array
    {
        $query = [
            'category_id' => $category_id,
        ];
        $path = 'product/support_size_chart';
        return $this->get($this->configuration, $path, $query);
    }

    public function updateSizeChartItemImage(array $data): array
    {
        $path = 'product/update_size_chart';
        return $this->post($this->configuration, $path, $data);
    }
}
