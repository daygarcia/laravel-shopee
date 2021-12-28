<?php

namespace LaravelShopee;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Http;

class Api
{
    private $url;
    public function __construct()
    {
        $this->url = config('shopee.sandbox') ? config('shopee.host.sandbox') : config('shopee.host.production');
    }

    public function get(String $access_token, String $path, array $query = null): array
    {
        return Http::withToken($access_token)->get($this->url . $path, $query)->throw()->json();
    }

    public function post(string $access_token, string $path, $data): array
    {
        return Http::withToken($access_token)->post($this->url . $path, $data)->throw()->json();
    }

    public function put(string $access_token, string $path, $data): array
    {
        return Http::withToken($access_token)->put($this->url . $path, $data)->throw()->json();
    }

    public function delete(string $access_token, $path): array
    {
        return Http::withToken($access_token)->delete($this->url . $path)->throw()->json();
    }

    public function upload(string $access_token, string $path, UploadedFile $file): array
    {
        return Http::withToken($access_token)->attach(
            'file',
            file_get_contents($file),
            $file->getClientOriginalName()
        )->post($this->url . $path)->throw()->json();
    }

    public function download(string $access_token, string $path)
    {
        return Http::withToken($access_token)->withHeaders([
            'Content-Type' => 'text/plain',
        ])->get($this->url . $path)->body();
    }
}
