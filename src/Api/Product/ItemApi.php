<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ItemApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getItemLimit(): array
    {
        $path = 'product/get_item_limit';
        return $this->get($this->configuration, $path);
    }

    public function getItems(int $offset = null, int $page_size = null, string $item_status = null, string $update_time_from = null, string $update_time_to = null): array
    {
        $query = [
            'offset'            => $offset ?? 1,
            'page_size'         => $page_size ?? 20,
            'item_status'       => $item_status ?? 'NORMAL',
            'update_time_from'  => $update_time_from,
            'update_time_to'    => $update_time_to,
        ];
        $path = 'product/get_item_list';
        return $this->get($this->configuration, $path, $query);
    }

    public function getItemBaseInfo(array $item_id_list, bool $need_tax_info = null, bool $need_complaint_policy = null): array
    {
        $query = [
            'item_id_list'          => implode(',', $item_id_list),
            'need_tax_info'         => $need_tax_info,
            'need_complaint_policy' => $need_complaint_policy,
        ];
        $path = 'product/get_item_base_info';
        return $this->get($this->configuration, $path, $query);
    }

    public function getItemExtraInfo(array $item_id_list): array
    {
        $query = [
            'item_id_list'  => implode(',', $item_id_list),
        ];
        $path = 'product/get_item_extra_info';
        return $this->get($this->configuration, $path, $query);
    }

    public function createItem(array $data): array
    {
        $path = 'product/add_item';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateItem(array $data): array
    {
        $path = 'product/update_item';
        return $this->post($this->configuration, $path, $data);
    }

    public function deleteItem(array $data): array
    {
        $path = 'product/delete_item';
        return $this->post($this->configuration, $path, $data);
    }

    public function unlistItem(array $data): array
    {
        $path = 'product/unlist_item';
        return $this->post($this->configuration, $path, $data);
    }

    public function getItemPromotion(array $item_id_list): array
    {
        $query = [
            'item_id_list' => implode(',', $item_id_list),
        ];
        $path = 'product/get_item_promotion';
        return $this->get($this->configuration, $path, $query);
    }

    public function getBoostedItems(): array
    {
        $path = 'product/get_boosted_list';
        return $this->get($this->configuration, $path);
    }

    public function boostItem(array $data): array
    {
        $path = 'product/boost_item';
        return $this->post($this->configuration, $path, $data);
    }

    public function searchItem(int $page_size, string $offset, int $item_name, int $attribute_status): array
    {
        $query = [
            'page_size'         => $page_size,
            'offset'            => $offset,
            'item_name'         => $item_name,
            'attribute_status'  => $attribute_status,
        ];
        $path = 'product/search_item';
        return $this->get($this->configuration, $path, $query);
    }
}
