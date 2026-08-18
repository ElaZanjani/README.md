<?php

namespace App\Providers;

use App\Http\Repositories\ProductGroups\ProductGroupRepository;
use App\Http\Repositories\ProductGroups\ProductGroupRepositoryInterface;
use App\Http\Repositories\Products\ProductRepository;
use App\Http\Repositories\Products\ProductRepositoryInterface;
use App\Http\Repositories\QrCode\QrCodeKartRepository;
use App\Http\Repositories\QrCode\QrCodeKartRepositoryInterface;
use App\Http\Repositories\Settings\SettingsRepository;
use App\Http\Repositories\Settings\SettingsRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(ProductRepositoryInterface::class, ProductRepository::class);
        $this->app->bind(ProductGroupRepositoryInterface::class, ProductGroupRepository::class);
        $this->app->bind(SettingsRepositoryInterface::class, SettingsRepository::class);
        $this->app->bind(QrCodeKartRepositoryInterface::class, QrCodeKartRepository::class);
    }

}
