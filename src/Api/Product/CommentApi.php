<?php


namespace LaravelShopee\Api\Product;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class CommentApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
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
}
