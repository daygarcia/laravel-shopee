<?php

namespace LaravelShopee;

/* 
    * @description: This class is used to generate the signature for the authorization url 
    * the signature is used to validate the request to the Shopee API
    * then, retrieve the code and shop_id to get the access token
*/

class AuthorizationSignature
{
    private $partner_id;
    private $redirect;
    private $path;
    private $timestamp;
    private $signature;
    private $base_path = '/api/v2/';

    public function __construct($partner_id, $key, $path, string $redirect)
    {
        $this->url = config('shopee.sandbox') ? config('shopee.host.sandbox') : config('shopee.host.production');
        $this->partner_id = $partner_id;
        $this->key = $key;
        $this->redirect = $redirect;
        $this->path = "{$this->base_path}{$path}";
        $this->timestamp = time();
    }

    public function signRequest()
    {
        $partner_id = $this->partner_id;
        $key = $this->key;
        $path = $this->path;
        $base_str = "{$partner_id}{$path}{$this->timestamp}";

        $this->signature = hash_hmac('sha256', $base_str, $key);

        return $this->signature;
    }

    public function setTime($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    public function setPath($path)
    {
        $this->path = $path;
    }

    public function setSignature($signature)
    {
        $this->signature = $signature;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getPath()
    {
        return $this->path;
    }

    public function getSignature()
    {
        return $this->signature;
    }

    public function getSignedUrl()
    {
        $query = http_build_query([
            'partner_id' => $this->partner_id,
            'redirect' => $this->redirect,
            'timestamp' => $this->timestamp,
            'sign' => $this->signature,
        ]);

        return $this->url . $this->path . "?{$query}";
    }
}
