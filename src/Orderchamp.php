<?php
namespace Orderchamp\Laravel;

use Illuminate\Support\Facades\Facade;
use Orderchamp\Api\OrderchampApiClient;

/**
 * @method static OrderchampApiClient api()
 */
class Orderchamp extends Facade
{
    public static function getFacadeAccessor(): string
    {
        return 'orderchamp';
    }
}
