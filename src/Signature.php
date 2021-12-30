<?php

namespace LaravelShopee;


class Signature

/* 
    * @description: This class is used to generate the signature for all requests
    * except the authentication, the request signature logic is on AuthenticationSignature class
*/
{
    private $partner_id;
    private $key;
    private $path;
    private $timestamp;
    private $signature;
    private $access_token;
    private $shop_id;
    private $base_path = '/api/v2/';

    public function __construct($partner_id, $key, $path, $access_token, $shop_id)
    {
        $this->url = config('shopee.sandbox') ? config('shopee.host.sandbox') : config('shopee.host.production');
        $this->partner_id = $partner_id;
        $this->key = $key;
        $this->access_token = $access_token;
        $this->shop_id = $shop_id;
        $this->path = "{$this->base_path}{$path}";

        $this->timestamp = time();
    }

    public function signRequest()
    {
        $base_str = "{$this->partner_id}{$this->path}{$this->timestamp}{$this->access_token}{$this->shop_id}";

        $this->signature = hash_hmac('sha256', $base_str, $this->key);

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
            'timestamp' => $this->timestamp,
            'sign' => $this->signature,
            'shop_id' => $this->shop_id,
            'access_token' => $this->access_token,
        ]);

        return $this->url . $this->path . "?{$query}";
    }
}
