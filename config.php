<?php
    return array(
                'templates.path'    => __DIR__ . '/templates/',
                'debug' => false,
                'log.enabled' => true,
                'log.writer' => new \Yee\Log\FileLogger(
                    array(
                        'path' => __DIR__.'/logs',
                        'name_format' => 'Y-m-d',
                        'message_format' => '%label% - %date% - %message%'
                    )
                ),
                'database' => array(
                    'memcache' => [
                        'connection.type'       => 'memcache',
                        'connection.host'       => [ [ '10.10.10.140', 11211, 50] ] 
                    ],
                     'mysqli' => array(
                        'connection.type'   => 'mysqli',
                        'database.host'     => 'localhost',
                        'database.name'     => 'kinguin_tasks',
                        'database.user'     => 'root',
                        'database.pass'     => '',
                        'database.port'     => 3306
                    )
                ),
                'session' => 'php',   // php, database or memcached
                'cache.path'=> __DIR__ . '/cache',
                'cache.timeout'=> 1800,
                'upload.path'=> __DIR__ . '/',
    );
