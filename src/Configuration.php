<?php


namespace LaravelShopee;

use Illuminate\Support\Facades\Http;

class Configuration
{
    private $partner_id;
    private $key;
    private $redirect;
    private $site_id;
    private $access_token;
    private $url;

    public function __construct(array $config)
    {
        $this->partner_id = $config['partner_id'];
        $this->key = $config['key'];
        $this->redirect = $config['redirect'];
        $this->site_id = $config['site_id'];
        $this->access_token = $config['access_token'];
        $this->url = config('shopee.sandbox') ? config('shopee.host.sandbox') : config('shopee.host.production');

        !empty($this->access_token) ? $this->setAccessToken($this->access_token) : $this->authorize();
    }

    public function authorize()
    {
        $response = Http::withHeaders([
            'Content-Type' => 'application/json',
        ])->post(
            $this->url . 'partner/authorize',
            [
                'partner_id' => $this->partner_id,
                'key' => $this->key,
                'redirect' => $this->redirect,
                'site_id' => $this->site_id,
            ]
        )->throw()->json();

        $this->setAccessToken($response['access_token']);
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }


    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }
}
