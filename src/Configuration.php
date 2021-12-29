<?php


namespace LaravelShopee;

class Configuration
{
    private $partner_id;
    private $key;
    private $redirect;
    private $site_id;
    private $access_token;
    private $url;
    private $code;
    private $shop_id;
    private $main_account_id;
    private $auth_path = '/api/v2/auth/access_token/get';

    public function __construct(array $config)
    {
        $this->partner_id = $config['partner_id'] ?? null;
        $this->key = $config['key'] ?? null;
        $this->redirect = $config['redirect'] ?? null;
        $this->site_id = $config['site_id'] ?? null;
        $this->code = $config['code'] ?? null;
        $this->shop_id = $config['shop_id'] ?? null;
        $this->main_account_id = $config['main_account_id'] ?? null;
        $this->access_token = $config['access_token'] ?? null;

        empty($this->access_token) ? $this->authorize() : null;
    }

    public function authorize(): array
    {
        try {
            $api = new Api();
            $response = $api->post($this, $this->auth_path, [
                'code'              => $this->code,
                'main_account_id'   => $this->main_account_id,
                'partner_id'        => $this->partner_id,
            ]);

            $this->setAccessToken($response['access_token']);
        } catch (\Exception $e) {
            $response = [
                'code' => $e->getCode(),
                'message' => $e->getMessage(),
            ];
        }

        return $response;
    }

    public function getAccessToken()
    {
        return $this->access_token;
    }

    public function getPartnerId()
    {
        return $this->partner_id;
    }

    public function getKey()
    {
        return $this->key;
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
