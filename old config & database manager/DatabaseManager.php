<?php

namespace Yee\Managers;

use \Yee\Yee;
use \Yee\Libraries\Database\MysqliDB;
use \Yee\Libraries\Connectors\MemcachedConnector;

class DatabaseManager extends Yee 
{
    protected $config;
    
    /**
     * @param array $options
     */
    function __construct()
    {
    	$app = \Yee\Yee::getInstance();
    	$this->config = $app->config('database');
    	
    	foreach( $this->config as $key => $database )
    	{
            if($database['connection.type'] == 'mysqli') {

    		  $app->db[$key] = new MysqliDB( $database['database.host'], $database['database.user'], $database['database.pass'], $database['database.name'], $database['database.port'] );
            } else if ($database['connection.type'] == 'memcache') {
                $app->db[$key] = new MemcachedConnector($database['connection.host']);
            }
    	}	
    }
}
