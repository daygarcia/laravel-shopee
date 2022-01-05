<?php

namespace LaravelShopee\Api;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class LogisticsApi extends Api
{

    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getShippingParameter(string $order_sn): array
    {
        $query = [
            'order_sn' => $order_sn,
        ];
        $path = 'logistics/get_shipping_parameter';
        return $this->get($this->configuration, $path, $query);
    }

    public function getTrackingNumber(string $order_sn, string $package_number, string $response_optional_fields): array
    {
        $$query = [
            'order_sn'                  => $order_sn,
            'package_number'            => $package_number,
            'response_optional_fields'  => $response_optional_fields,
        ];
        $path = 'logistics/get_tracking_number';
        return $this->get($this->configuration, $path, $query);
    }

    public function shipOrder(array $data): array
    {
        $path = 'logistics/ship_order';
        return $this->post($this->configuration, $path, $data);
    }

    public function updateShippingOrder(array $data): array
    {
        $path = 'logistics/update_shipping_order';
        return $this->post($this->configuration, $path, $data);
    }

    /* 
        * Pega dados de parametros de entrega	
    */
    public function getShippingDocumentParameter(array $data): array
    {
        $path = 'logistics/get_shipping_document_parameter';
        return $this->post($this->configuration, $path, $data);
    }

    /* 
        * Cria documento de entrega
    */
    public function createShippingDocument(array $data): array
    {
        $path = 'logistics/create_shipping_document';
        return $this->post($this->configuration, $path, $data);
    }

    /* 
        * Verifica se o documento de entrega foi criado
    */
    public function getShippingDocumentResult(array $data): array
    {
        $path = 'logistics/get_shipping_document_result';
        return $this->post($this->configuration, $path, $data);
    }

    public function downloadShippingDocument(array $body)
    {
        $path = 'logistics/download_shipping_document';
        return $this->download($this->configuration, $path, $body);
    }

    /* 
        * Retorna as informações de envio de acordo com o id do pedido
    */
    public function getShippingDocumentInfo(string $order_sn, string $package_number = null): array
    {
        $query = [
            'order_sn' => $order_sn,
            'package_number' => $package_number,
        ];
        $path = 'logistics/get_shipping_document_info';
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

    public function getAddressList(): array
    {
        $path = 'logistics/get_address_list';
        return $this->get($this->configuration, $path);
    }

    public function setAddressConfig(array $data): array
    {
        $path = 'logistics/set_address_config';
        return $this->post($this->configuration, $path, $data);
    }

    public function deleteAddress(array $data): array
    {
        $path = 'logistics/delete_address';
        return $this->post($this->configuration, $path, $data);
    }

    public function getChannelList(): array
    {
        $path = 'logistics/get_channel_list';
        return $this->get($this->configuration, $path);
    }

    public function updateChannel(array $data): array
    {
        $path = 'logistics/update_channel';
        return $this->post($this->configuration, $path, $data);
    }

    public function batchShipOrder(array $data): array
    {
        $path = 'logistics/batch_ship_order';
        return $this->post($this->configuration, $path, $data);
    }
}
