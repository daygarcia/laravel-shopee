<?php

namespace LaravelShopee;

// use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class Api
{
    public function get(Configuration $configuration, string $path, array $query = null): array
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getShopId(),
            $configuration->getKey(),
            $path
        );
        $signature->signRequest();

        return Http::withToken($configuration->getAccessToken())->get($signature->getSignedUrl(), $query)->throw()->json();
    }

    public function post(Configuration $configuration, string $path, array $data): array
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getShopId(),
            $configuration->getKey(),
            $path
        );
        $signature->signRequest();

        return Http::withToken($configuration->getAccessToken())->post($signature->getSignedUrl(), $data)->throw()->json();
    }

    public function put(Configuration $configuration, string $path, $data): array
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getShopId(),
            $configuration->getKey(),
            $path
        );
        $signature->signRequest();

        return Http::withToken($configuration->getAccessToken())->put($signature->getSignedUrl(), $data)->throw()->json();
    }

    public function delete(Configuration $configuration, $path): array
    {
        $signature = new Signature(
            $configuration->getPartnerId(),
            $configuration->getShopId(),
            $configuration->getKey(),
            $path
        );
        $signature->signRequest();

        return Http::withToken($configuration->getAccessToken())->delete($signature->getSignedUrl())->throw()->json();
    }

    // to implement in case of need
    /* public function upload(Configuration $configuration, string $path, UploadedFile $file): array
    {
        return Http::withToken($configuration->getAccessToken())->attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($this->url . $path)->throw()->json();
    }

    public function download(Configuration $configuration, string $path)
    {
        return Http::withToken($configuration->getAccessToken())->withHeaders([
            'Content-Type' => 'text/plain',
        ])->get($this->url . $path)->body();
    } */
}
