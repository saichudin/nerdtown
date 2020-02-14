<?php

namespace App\Providers;

use App\CustomCheckoutDataFactory;
use App\Models\Product;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Vanilo\Checkout\Contracts\CheckoutDataFactory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(CheckoutDataFactory::class, function () {
            return new CustomCheckoutDataFactory();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            Product::class => Product::class,
            'product' => Product::class
        ]);
    }
}
