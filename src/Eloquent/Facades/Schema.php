<?php
namespace Motekar\WPORM\Eloquent\Facades;

use Illuminate\Support\Facades\Facade;
use Motekar\WPORM\Eloquent\SchemaBuilder;

/**
 * @see \Illuminate\Database\DatabaseManager
 * @see \Illuminate\Database\Connection
 */
class Schema extends Facade
{
    protected static function getFacadeAccessor()
    {
        return SchemaBuilder::instance();
    }
}
