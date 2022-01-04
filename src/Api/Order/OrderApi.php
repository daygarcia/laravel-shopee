<?php


namespace LaravelShopee\Api\Order;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class OrderApi extends Api
{
    private const FIVE_DAYS = 432000;
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getOrders(string $time_range_field = null, int $time_from = null, int $time_to = null, int $page_size = null, string $cursor = null, string $order_status = null, string $response_optional_fields = null): array
    {
        $query = [
            'time_range_field' => $time_range_field ?? 'create_time',
            'time_from' => $time_from ?? (time() - self::FIVE_DAYS),
            'time_to' => $time_to ?? time(),
            'page_size' => $page_size ?? 20,
            'cursor' => $cursor,
            'order_status' => $order_status ?? 'READY_TO_SHIP',
            'response_optional_fields' => $response_optional_fields,
        ];
        $path = 'order/get_order_list';
        return $this->get($this->configuration, $path, $query);
    }

    public function getOrderDetail(array $order_sn_list, string $response_optional_fields = null): array
    {
        $query = [
            'order_sn_list'                 => implode(',', $order_sn_list),
            'response_optional_fields'      => $response_optional_fields,
        ];
        $path = 'order/get_order_detail';
        return $this->get($this->configuration, $path, $query);
    }

    public function splitOrder(array $data): array
    {
        $path = 'order/split_order';
        return $this->post($this->configuration, $path, $data);
    }

    public function unsplitOrder(array $data): array
    {
        $path = 'order/unsplit_order';
        return $this->post($this->configuration, $path, $data);
    }

    public function cancelOrder(array $data): array
    {
        $path = 'order/cancel_order';
        return $this->post($this->configuration, $path, $data);
    }

    public function handleBuyerCancellation(array $data): array
    {
        $path = 'order/handle_buyer_cancellation';
        return $this->post($this->configuration, $path, $data);
    }

    public function createOrderNote(array $data): array
    {
        $path = 'order/set_note';
        return $this->post($this->configuration, $path, $data);
    }

    public function addInvoiceInfo(array $data): array
    {
        $path = 'order/add_invoice_data';
        return $this->post($this->configuration, $path, $data);
    }

    public function getShippedOrders(int $page_size, string $cursor = null): array
    {
        $query = [
            'page_size' => $page_size,
            'cursor' => $cursor,
        ];
        $path = 'order/get_shipment_list';
        return $this->get($this->configuration, $path, $query);
    }
}
