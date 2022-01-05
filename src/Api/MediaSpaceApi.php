<?php


namespace LaravelShopee\Api;

use Illuminate\Http\UploadedFile;
use LaravelShopee\Api;
use LaravelShopee\Configuration;

class MediaSpaceApi extends Api
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

    public function initVideoUpload(array $data): array
    {
        $path = 'mediaspace/init_video_upload';
        return $this->post($this->configuration, $path, $data);
    }

    public function uploadVideoPart(array $data): array
    {
        $path = 'mediaspace/upload_video_part';
        return $this->post($this->configuration, $path, $data);
    }

    public function completeVideoUpload(array $data): array
    {
        $path = 'mediaspace/complete_video_upload';
        return $this->post($this->configuration, $path, $data);
    }

    public function getVideoUploadResult(string $video_upload_id): array
    {
        $query = [
            'video_upload_id' => $video_upload_id,
        ];
        $path = 'mediaspace/get_video_upload_result';
        return $this->get($this->configuration, $path, $query);
    }

    public function cancelVideoUpload(array $data): array
    {
        $path = 'mediaspace/cancel_video_upload';
        return $this->get($this->configuration, $path, $data);
    }
}
