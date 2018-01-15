<?php
    return array(
                'templates.path'    => __DIR__ . '/templates/',
                'debug' => true,
                'log.enabled' => true,
                'log.writer' => new \Yee\Log\FileLogger(
                    array(
                        'path' => __DIR__.'/logs',
                        'name_format' => 'Y-m-d',
                        'message_format' => '%label% - %date% - %message%'
                    )
                ),
                'session' => 'php',   // php, database or memcached
                'cache.path'=> __DIR__ . '/cache',
                'cache.timeout'=> 1800,
                'database' => array(
                                'db1' => array(
                                'database.host' => 'localhost',
                                'database.name' => 'kinguin_tasks',
                                'database.user' => 'root',
                                'database.pass' => '',
                                'database.port' => 3306
                                )
                            )
                );

