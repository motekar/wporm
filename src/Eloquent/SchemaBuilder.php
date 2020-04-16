<?php

namespace Motekar\WPORM\Eloquent;

use Illuminate\Database\Schema\MySqlBuilder;

class SchemaBuilder extends MySqlBuilder
{
    /**
     * Create a new database Schema manager.
     *
     * @param  \Illuminate\Database\Connection  $connection
     * @return void
     */
    public function __construct()
    {
        $this->connection = Connection::instance();
        $this->grammar = $this->connection->getSchemaGrammar();
    }

    /**
     * Initializes the SchemaBuilder class
     *
     * @return \Motekar\WPORM\Eloquent\SchemaBuilder
     */
    public static function instance()
    {
        static $instance = false;

        if (!$instance) {
            $instance = new self;
        }

        return $instance;
    }
}
