<?php

    return array(
        'doctrine' => array(
            'connection' => array(
                'orm_default' => array(
                    'driverClass' => 'Doctrine\DBAL\Driver\PDOMySql\Driver',
                    'params' => array(
                        'host' => 'place_database_ip_database_here',
                        'port' => '3306',
                        'dbname' => 'place_database_name_here',
                        'user' => 'place_database_username_here',
                        'password' => 'place_database_password_here',
                        'charset' => 'utf8',
                        'driverOptions' => array(
                            1002 => 'SET NAMES utf8'
                        )
                    ),
                ),
            ),
            'configuration' => array(
                'orm_default' => array(
                    // Generate proxies should be FALSE on production servers
                    'generate_proxies' => true,
                ),
            ),
        )
    );