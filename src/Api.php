<?php

namespace LaravelShopee;

// use Illuminate\Http\UploadedFile;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class Api
{
    public function get(Configuration $configuration, string $path, array $query = null): array
    {
        return Http::withToken($configuration->getAccessToken())->get($this->getSignedUrl($configuration, $path), $query)->throw()->json();
    }

    public function post(Configuration $configuration, string $path, array $data): array
    {
        return Http::withToken($configuration->getAccessToken())->post($this->getSignedUrl($configuration, $path), $data)->throw()->json();
    }

    public function put(Configuration $configuration, string $path, $data): array
    {
        return Http::withToken($configuration->getAccessToken())->put($this->getSignedUrl($configuration, $path), $data)->throw()->json();
    }

    public function delete(Configuration $configuration, $path): array
    {
        return Http::withToken($configuration->getAccessToken())->delete($this->getSignedUrl($configuration, $path))->throw()->json();
    }

    public function upload(Configuration $configuration, string $path, UploadedFile $file): array
    {
        return Http::withToken($configuration->getAccessToken())->attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($this->getSignedUrl($configuration, $path))->throw()->json();
    }

    public function download(Configuration $configuration, string $path)
    {
        return Http::withToken($configuration->getAccessToken())->withHeaders([
            'Content-Type' => 'text/plain',
        ])->get($this->getSignedUrl($configuration, $path))->body();
    }

    public function getSignedUrl(Configuration $configuration, string $path)
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getKey(),
            $path
        );
        $signature->signRequest();

        return $signature->getSignedUrl();
    }
}
