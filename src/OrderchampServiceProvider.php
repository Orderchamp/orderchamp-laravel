<?php
namespace Orderchamp\Laravel;

use Illuminate\Contracts\Container\Container;
use Illuminate\Foundation\Application as LaravelApplication;
use Illuminate\Support\ServiceProvider;
use Laravel\Lumen\Application as LumenApplication;
use Orderchamp\Api\OrderchampApiClient;

class OrderchampServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->setupConfig();
    }

    public function register()
    {
        $this->registerApi();
        $this->registerManager();
    }

    public function provides()
    {
        return [
            'orderchamp.api',
            'orderchamp',
        ];
    }

    protected function setupConfig()
    {
        $path = __DIR__ . '/../config/orderchamp.php';

        if ($this->app instanceof LaravelApplication && $this->app->runningInConsole()) {
            $this->publishes([$path => config_path('orderchamp.php')]);
        } elseif ($this->app instanceof LumenApplication) {
            $this->app->configure('orderchamp');
        }

        $this->mergeConfigFrom($path, 'orderchamp');
    }

    protected function registerApi()
    {
        $this->app->singleton('orderchamp.api', function (Container $app) {
            return (new OrderchampApiClient($app['config']['orderchamp']))
                ->addVersion('OrderchampLaravel', OrderchampManager::VERSION);
        });

        $this->app->alias('orderchamp.api', OrderchampApiClient::class);
    }

    protected function registerManager()
    {
        $this->app->singleton('orderchamp', function (Container $app) {
            return new OrderchampManager($app);
        });

        $this->app->alias('orderchamp', OrderchampManager::class);
    }
}
