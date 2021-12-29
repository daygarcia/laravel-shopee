<?php


namespace LaravelShopee\Api\Logistics;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class TrackingApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getTrackingNumber(string $order_sn, string $package_number, string $response_optional_fields): array
    {
        $query = [
            'order_sn' => $order_sn,
            'package_number' => $package_number,
            'response_optional_fields' => $response_optional_fields,
        ];
        $path = 'logistics/get_shipping_parameter';
        return $this->get($this->configuration, $path, $query);
    }

    public function getTrackingInfo(string $order_sn, string $package_number = null): array
    {
        $query = [
            'order_sn' => $order_sn,
            'package_number' => $package_number,
        ];
        $path = 'logistics/get_tracking_info';
        return $this->get($this->configuration, $path, $query);
    }
}
