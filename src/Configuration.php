<?php


namespace LaravelShopee;

use LaravelShopee\Authentication;

class Configuration
{
    private $partner_id;
    private $key;
    private $redirect;
    private $access_token;
    private $url;
    private $code;
    private $shop_id;
    private $refresh_token;
    private $token_path = 'auth/token/get/';
    private $access_token_path = 'auth/access_token/get/';

    public function __construct(array $config)
    {
        $this->partner_id = $config['partner_id'] ?? config('shopee.partner_id');
        $this->key = $config['key'] ?? config('shopee.key');
        $this->redirect = $config['redirect'] ?? config('shopee.redirect');
        $this->code = $config['code'] ?? null;
        $this->shop_id = $config['shop_id'] ?? config('shopee.shop_id');
        $this->access_token = $config['access_token'] ?? null;
        $this->refresh_token = $config['refresh_token'] ?? null;

        !empty($this->code) ? $this->getFirstAccessTokenUsingCode() : null;
        !empty($this->refresh_token) ? $this->getAccessTokenUsingRefreshToken() : null;
    }

    public function getFirstAccessTokenUsingCode(): array
    {

        $body = [
            'code'           => $this->code,
            'shop_id'        => intval($this->shop_id),
            'partner_id'     => intval($this->partner_id),
        ];

        return $this->sendRequest($this->token_path, $body);
    }

    public function getAccessTokenUsingRefreshToken(): array
    {
        $body = [
            'refresh_token'  => $this->refresh_token,
            'shop_id'        => intval($this->shop_id),
            'partner_id'     => intval($this->partner_id),
        ];

        return $this->sendRequest($this->access_token_path, $body);
    }

    public function sendRequest(string $path, array $body): array
    {
        try {
            $authentication = new Authentication();
            $response = $authentication->authenticate(
                $this,
                $path,
                $body
            );

            $this->access_token = $response['access_token'];
            $this->refresh_token = $response['refresh_token'];
        } catch (\Exception $e) {
            $response = [
                'code'      => $e->getCode(),
                'message'   => $e->getMessage(),
            ];
        }

        return $response;
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getRefreshToken()
    {
        return $this->refresh_token;
    }

    public function getPartnerId()
    {
        return $this->partner_id;
    }

    public function getKey()
    {
        return $this->key ?? config('shopee.key');
    }

    public function getRedirect()
    {
        return $this->redirect;
    }

    public function getSiteId()
    {
        return $this->site_id;
    }

    public function getUrl()
    {
        return $this->url;
    }

    public function getShopId()
    {
        return $this->shop_id;
    }

    public function setAccessToken($access_token): void
    {
        $this->access_token = $access_token;
    }

    public function setRefreshToken($refresh_token): void
    {
        $this->refresh_token = $refresh_token;
    }

    public function setPartnerId($partner_id): void
    {
        $this->partner_id = $partner_id;
    }

    public function setKey($key): void
    {
        $this->key = $key;
    }

    public function setRedirect($redirect): void
    {
        $this->redirect = $redirect;
    }

    public function setSiteId($site_id): void
    {
        $this->site_id = $site_id;
    }

    public function setUrl($url): void
    {
        $this->url = $url;
    }

    public function setShopId($shop_id): void
    {
        $this->shop_id = $shop_id;
    }
}
