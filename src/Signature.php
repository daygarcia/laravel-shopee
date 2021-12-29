<?php

namespace LaravelShopee;

use DateTime;

class Signature
{
    private $partner_id;
    private $shop_id;
    private $key;
    private $path;
    private $timestamp;

    public function __construct($partner_id, $shop_id, $key, $path)
    {
        $this->url = config('shopee.sandbox') ? config('shopee.host.sandbox') : config('shopee.host.production');
        $this->partner_id = $partner_id;
        $this->shop_id = $shop_id;
        $this->key = $key;
        $this->path = $path;
        $date = new DateTime();
        $this->timestamp = $date->getTimestamp();
    }

    public function signRequest()
    {
        $partner_id = $this->partner_id;
        $shop_id = $this->shop_id;
        $secret_key = $this->key;
        $path = $this->path;
        $base_str = $partner_id . $path . $this->timestamp . $shop_id;
        $signature = hash_hmac('sha256', $base_str, $secret_key);

        return $signature;
    }

    public function setTime($time)
    {
        $this->time = $time;
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
            'timestamp' => $this->time,
            'sign' => $this->signature,
        ]);

        return $this->url . $this->path . "?{$query}";
    }
}
