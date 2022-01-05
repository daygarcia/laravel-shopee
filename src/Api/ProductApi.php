<?php

namespace LaravelShopee\Api;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ProductApi extends Api
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

    public function getRecommendAttribute(string $item_name = null, int $cover_image_id = null, int $category_id = null): array
    {
        $query = [
            'item_name' => $item_name,
            'cover_image_id' => $cover_image_id,
            'category_id' => $category_id,
        ];

        $path = 'product/get_recommend_attribute';
        return $this->get($this->configuration, $path, $query);
    }

    public function getBrandList(int $category_id, int $page_size = 10, int $status = 1, int $offset = 0, string $language = null): array
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

    public function getCategory(string $language = null): array
    {
        $query = [
            'language' => $language ?? config('shopee.language'),
        ];
        $path = 'product/get_category';
        return $this->get($this->configuration, $path, $query);
    }

    public function categoryRecommend(string $item_name): array
    {
        $query = [
            'item_name ' => $item_name,
        ];
        $path = 'product/category_recommend';
        return $this->get($this->configuration, $path, $query);
    }

    public function getComment(string $cursor, int $page_size, int $item_id = null, int $comment_id = null): array
    {
        $query = [
            'cursor' => $cursor,
            'page_size' => $page_size,
            'item_id' => $item_id,
            'comment_id' => $comment_id,
        ];
        $path = 'product/get_comment';
        return $this->get($this->configuration, $path, $query);
    }

    public function replyComment(array $data): array
    {
        $path = 'product/reply_comment';
        return $this->post($this->configuration, $path, $data);
    }

    public function getDtsLimit(int $category_id): array
    {
        $query = [
            'category_id' => $category_id,
        ];
        $path = 'product/get_dts_limit';
        return $this->get($this->configuration, $path, $query);
    }

    public function getItemLimit(): array
    {
        $path = 'product/get_item_limit';
        return $this->get($this->configuration, $path);
    }

    public function getItemList(int $offset = null, int $page_size = null, string $item_status = null, string $update_time_from = null, string $update_time_to = null): array
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

    public function getBoostedList(): array
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

    public function getItemModels(int $item_id): array
    {
        $query = [
            'item_id' => $item_id,
        ];
        $path = 'product/get_item_models';
        return $this->get($this->configuration, $path, $query);
    }

    public function addModel(array $data): array
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

    public function updatePrice(array $data): array
    {
        $path = 'product/update_price';
        return $this->post($this->configuration, $path, $data);
    }

    public function supportSizeChart(int $category_id): array
    {
        $query = [
            'category_id' => $category_id,
        ];
        $path = 'product/support_size_chart';
        return $this->get($this->configuration, $path, $query);
    }

    public function updateSizeChart(array $data): array
    {
        $path = 'product/update_size_chart';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateStock(array $data): array
    {
        $path = 'product/update_stock';
        return $this->post($this->configuration, $path, $data);
    }

    public function initTierVariation(array $data): array
    {
        $path = 'product/init_tier_variation';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateTierVariation(array $data): array
    {
        $path = 'product/update_tier_variation';
        return $this->post($this->configuration, $path, $data);
    }
}
