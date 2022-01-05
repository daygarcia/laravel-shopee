<?php


namespace LaravelShopee\Api;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ReturnApi extends Api
{

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getReturns(int $page_no, int $page_size, string $create_time_from = null, string $create_time_to = null): array
    {
        $query = [
            'page_no' => $page_no,
            'page_size' => $page_size,
            'create_time_from' => $create_time_from,
            'create_time_to' => $create_time_to,
        ];
        $path = 'returns/get_return_list';
        return $this->get($this->configuration, $path, $query);
    }

    public function getReturnDetail(int $return_sn): array
    {
        $query = [
            'return_sn' => $return_sn,
        ];
        $path = 'returns/get_return_detail';
        return $this->get($this->configuration, $path, $query);
    }

    public function confirmReturn(array $data): array
    {
        $path = 'returns/confirm';
        return $this->post($this->configuration, $path, $data);
    }

    public function disputeReturn(array $data): array
    {
        $path = 'returns/dispute';
        return $this->post($this->configuration, $path, $data);
    }
}
