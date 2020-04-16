<?php
namespace Motekar\WPORM\Eloquent\Facades;

use Illuminate\Support\Facades\Facade;
use Motekar\WPORM\Eloquent\Connection;

/**
 * @see \Illuminate\Database\DatabaseManager
 * @see \Illuminate\Database\Connection
 */
class DB extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return Connection::instance();
    }
}
