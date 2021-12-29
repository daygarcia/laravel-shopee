<?php


namespace LaravelShopee\Api\Logistics;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class AddressApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getAddresses(): array
    {
        $path = 'logistics/get_address_list';
        return $this->get($this->configuration, $path);
    }

    public function setShopAddress(array $data): array
    {
        $path = 'logistics/set_address_config';
        return $this->post($this->configuration, $path, $data);
    }

    public function deleteAddress(array $data): array
    {
        $path = 'logistics/delete_address';
        return $this->post($this->configuration, $path, $data);
    }
}
