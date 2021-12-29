<?php

namespace LaravelShopee\Api\MediaSpace;

use Illuminate\Http\UploadedFile;
use LaravelShopee\Api;
use LaravelShopee\Configuration;

class VideoApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    // to implement: https://open.shopee.com/documents?module=91&type=1&id=531&version=2
}
