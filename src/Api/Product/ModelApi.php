<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ModelApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getItemModels(int $item_id): array
    {
        $query = [
            'item_id' => $item_id,
        ];
        $path = 'product/get_item_limit';
        return $this->get($this->configuration, $path, $query);
    }

    public function createModel(array $data): array
    {
        $path = 'product/add_model';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateModel(array $data): array
    {
        $path = 'product/update_model';
        return $this->post($this->configuration, $path, $data);
    }

    public function deleteModel(array $data): array
    {
        $path = 'product/delete_model';
        return $this->post($this->configuration, $path, $data);
    }
}
