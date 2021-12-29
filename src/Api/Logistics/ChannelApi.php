<?php


namespace LaravelShopee\Api\Logistics;

use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ChannelApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function getChannels(): array
    {
        $path = 'logistics/get_channel_list';
        return $this->get($this->configuration, $path);
    }

    public function updateChannel(array $data): array
    {
        $path = 'logistics/update_channel';
        return $this->post($this->configuration, $path, $data);
    }
}
