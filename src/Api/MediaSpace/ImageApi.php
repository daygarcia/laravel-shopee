<?php


namespace LaravelShopee\Api\MediaSpace;

use Illuminate\Http\UploadedFile;
use LaravelShopee\Api;
use LaravelShopee\Configuration;

class ImageApi extends Api
{
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    public function uploadImage(UploadedFile $image): array
    {
        $path = 'media_space/upload_image';
        return $this->upload($this->configuration, $path, $image);
    }
}
