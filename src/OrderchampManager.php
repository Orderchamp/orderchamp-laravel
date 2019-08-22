<?php
namespace Orderchamp\Laravel;

use Illuminate\Contracts\Container\Container;
use Orderchamp\Api\OrderchampApiClient;

class OrderchampManager
{
    public const VERSION = '1.0.0';

    /**
     * @var Container
     */
    protected $app;

    public function __construct(Container $app)
    {
        $this->app = $app;
    }

    public function api(): OrderchampApiClient
    {
        return $this->app['orderchamp.api'];
    }
}
