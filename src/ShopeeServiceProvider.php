<?php

namespace LaravelShopee;

use Illuminate\Support\ServiceProvider;
use DayGarcia\LaravelShopee\MercadoLivre;
use Illuminate\Support\Facades\Storage;

class ShopeeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */


    public function register()
    {
        /* $this->app->singleton('shopee', function () {
            return new Shopee();
        }); */
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/shopee.php' => config_path('shopee.php'),
        ]);
        // check if the App/Http/Requests/LaravelhopeeExists directory exists
        if (!file_exists(app_path('Http/Requests/LaravelShopee/'))) {
            mkdir(app_path('Http/Requests/LaravelShopee/'), 0755, true);
        }
        $this->publishes([
            __DIR__ . '/app/Http/Requests/' => app_path('Http/Requests/LaravelShopee/'),
        ]);

        /* $this->client_id = config('shopee.client_id');
        $this->client_secret = config('shopee.client_secret');
        $this->urls = config('shopee.urls'); */
    }
}
