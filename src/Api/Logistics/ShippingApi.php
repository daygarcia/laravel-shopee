<?php


namespace LaravelShopee\Api\Logistics;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ShippingApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getShippingInfoByOrderSn(string $order_sn): array
    {
        $query = [
            'order_sn' => $order_sn,
        ];
        $path = 'logistics/get_shipping_parameter';
        return $this->get($this->configuration, $path, $query);
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

    public function downloadShippingDocument(array $data): array
    {
        $path = 'logistics/get_shipping_document_parameter';
        return $this->post($this->configuration, $path, $data);
    }

    /* 
        * Retorna as informações de envio de acordo com o id do pedido
    */
    public function getShoppingDocumentInfo(string $order_sn, string $package_number = null): array
    {
        $query = [
            'order_sn' => $order_sn,
            'package_number' => $package_number,
        ];
        $path = 'logistics/get_shipping_document_info';
        return $this->get($this->configuration, $path, $query);
    }

    public function createOrderShipping(array $data): array
    {
        $path = 'logistics/ship_order';
        return $this->post($this->configuration, $path, $data);
    }

    public function createBatchOrderShipping(array $data): array
    {
        $path = 'logistics/batch_ship_order';
        return $this->post($this->configuration, $path, $data);
    }
}
