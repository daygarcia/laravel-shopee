<?php

namespace LaravelShopee;

// use Illuminate\Http\UploadedFile;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class Api
{
    public function get(Configuration $configuration, string $path, array $query = null): array
    {
        $response = Http::withToken($configuration->getAccessToken())->get($this->getSignedUrl($configuration, $path) . http_build_query($query))->throw()->json();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function post(Configuration $configuration, string $path, array $data): array
    {
        $response = Http::withToken($configuration->getAccessToken())->post($this->getSignedUrl($configuration, $path), $data)->throw()->json();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function put(Configuration $configuration, string $path, $data): array
    {
        $response = Http::withToken($configuration->getAccessToken())->put($this->getSignedUrl($configuration, $path), $data)->throw()->json();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function delete(Configuration $configuration, $path): array
    {
        $response = Http::withToken($configuration->getAccessToken())->delete($this->getSignedUrl($configuration, $path))->throw()->json();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function upload(Configuration $configuration, string $path, UploadedFile $file): array
    {
        $response = Http::withToken($configuration->getAccessToken())->attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($this->getSignedUrl($configuration, $path))->throw()->json();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function download(Configuration $configuration, string $path)
    {
        $response = Http::withToken($configuration->getAccessToken())->withHeaders([
            'Content-Type' => 'text/plain',
        ])->get($this->getSignedUrl($configuration, $path))->body();
        if (isset($response['error'])) {
            throw new \Exception($response['error']['message'], 500);
        }
        return $response;
    }

    public function getSignedUrl(Configuration $configuration, string $path)
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getKey(),
            $path,
            $configuration->getAccessToken(),
            $configuration->getShopId()
        );
        $signature->signRequest();

        return $signature->getSignedUrl();
    }
}
